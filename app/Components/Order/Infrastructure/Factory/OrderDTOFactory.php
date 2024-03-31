<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory;

use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use App\Components\Order\Application\DTO\OrderFormable;
use App\Components\Order\Domain\DTO\OrderDTO;
use App\Components\Order\Domain\DTO\OrderFormableDTO;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Infrastructure\Mapper\ProductModelMapper;
use Illuminate\Support\Collection;

class OrderDTOFactory
{
    public function __construct(
        private readonly OrderItemDTOFactory $itemDTOFactory,
        private readonly ProductRepository   $productRepository,
        private readonly ProductModelMapper  $productModelMapper,
    )
    {
    }

    public function createOrderDTOForPreview(OrderTypeEnum $type, Collection $items): OrderDTO
    {
        $products = $this->productRepository
            ->getByUuids($items->pluck('product_uuid')->toArray(), [
                'uuid',
                'name',
                'price',
                'is_vegetarian',
                'is_spicy',
            ]);

        $orderItems = $this->productModelMapper->withItemsToOrderItem($products, $items);

        return new OrderDTO(
            status: OrderStatusEnum::PREPARING,
            type: $type,
            subtotalAmount: new Money(
                amount: $orderItems->sum(fn($orderItem) => $orderItem->subtotalPrice->getAmount()),
                currency: new Currency('EUR')
            ),
            totalAmount: new Money(
                amount: $orderItems->sum(fn($orderItem) => $orderItem->totalPrice->getAmount()),
                currency: new Currency('EUR')
            ),
            paymentMethod: null,
            isPaid: false,
            annotation: null,
            orderItems: $orderItems
        );
    }

    public function createOrderFormableDTO(OrderFormable $orderFormable): OrderFormableDTO
    {
        return new OrderFormableDTO(
            status: OrderStatusEnum::PREPARING,
            type: $orderFormable->type(),
            subtotalAmount: (int)$orderFormable->subtotalAmount(),
            totalAmount: (int)$orderFormable->totalAmount(),
            paymentMethod: $orderFormable->paymentMethod(),
            isPaid: $orderFormable->isPaid(),
            annotation: $orderFormable->annotation(),
        );
    }
}
