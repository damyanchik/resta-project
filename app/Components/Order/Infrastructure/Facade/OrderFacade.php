<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Facade;

use App\Components\Cart\Application\Facade\CartFacade;
use App\Components\Order\Application\DTO\OrderFormable;
use App\Components\Order\Domain\Enum\OrderItemAttributeEnum;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Infrastructure\Builder\OrderBuilder;
use App\Components\Order\Infrastructure\Builder\OrderItemBuilder;
use App\Components\Order\Infrastructure\Factory\OrderItemDTOFactory;
use App\Components\Order\Infrastructure\Service\OrderService;
use Illuminate\Database\Connection;
use Throwable;

class OrderFacade
{
    public function __construct(
        private readonly CartFacade          $cartFacade,
        private readonly OrderBuilder        $orderBuilder,
        private readonly OrderItemBuilder    $orderItemBuilder,
        private readonly OrderItemDTOFactory $orderItemDTOFactory,
        private readonly OrderService        $orderService,
        private readonly Connection          $connection,
    )
    {
    }

    /** @throws Throwable */
    public function createByFormable(OrderFormable $orderFormable): void
    {
        $orderItemFormableDTOs = $this->orderItemBuilder
            ->setOrderEntryItems($orderFormable->items()->map(
                fn($item) => $this->orderItemDTOFactory->createOrderItemBasicDTO(
                    productUuid: $item[OrderItemAttributeEnum::PRODUCT_UUID],
                    quantity: $item[OrderItemAttributeEnum::QUANTITY],
                ),
            ))
            ->setDiscount('')
            ->setOrderStatus($orderFormable->status())
            ->build();

        $this->connection->transaction(function () use ($orderFormable, $orderItemFormableDTOs) {
            return $this->orderService->store(
                orderFormableDTO: $this->orderBuilder
                    ->setStatus($orderFormable->status())
                    ->setType($orderFormable->type())
                    ->setPaymentMethod($orderFormable->paymentMethod(), $orderFormable->isPaid())
                    ->setAnnotation($orderFormable->annotation())
                    ->setOrderItemFormableDTOs($orderItemFormableDTOs)
                    ->build(),
                orderItemFormableDTOs: $orderItemFormableDTOs,
            );
        });
    }

    /** @throws Throwable */
    public function createByFormableAndSelfCartSession(OrderFormable $orderFormable): void
    {
        $cartFormableDTO = $this->cartFacade->getFormableCart();

        $orderItemFormableDTOs = $this->orderItemBuilder
            ->setOrderEntryItems($cartFormableDTO->cartFormableItemDTOs->map(
                fn($item) => $this->orderItemDTOFactory->createOrderItemBasicDTO($item->productUuid, $item->quantity),
            ))
            ->setDiscount('')
            ->setOrderStatus(OrderStatusEnum::RECEIVED)
            ->build();

        $this->connection->transaction(function () use ($orderFormable, $orderItemFormableDTOs) {
            return $this->orderService->store(
                orderFormableDTO: $this->orderBuilder
                    ->setStatus(OrderStatusEnum::RECEIVED)
                    ->setType($orderFormable->type())
                    ->setPaymentMethod($orderFormable->paymentMethod())
                    ->setAnnotation($orderFormable->annotation())
                    ->setOrderItemFormableDTOs($orderItemFormableDTOs)
                    ->build(),
                orderItemFormableDTOs: $orderItemFormableDTOs,
            );
        });
    }

    public function showOrderByUuid(string $uuid)
    {

    }
}
