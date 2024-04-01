<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Facade;

use App\Components\Order\Application\DTO\OrderFormable;
use App\Components\Order\Domain\DTO\OrderDTO;
use App\Components\Order\Domain\Exception\OrderItemException;
use App\Components\Order\Infrastructure\Factory\OrderDTOFactory;
use App\Components\Order\Infrastructure\Repository\OrderRepository;

class OrderFacade
{
    public function __construct(
        private readonly OrderRepository $orderRepository,
        private readonly OrderDTOFactory $orderDTOFactory,
    )
    {
    }

    /**
     * @throws OrderItemException
     */
    public function getPreviewByFormable(OrderFormable $orderFormable): OrderDTO
    {
        return $this->orderDTOFactory->createOrderDTOForPreview(
            type: $orderFormable->type(),
            items: $orderFormable->items(),
        );
    }

    public function createByFormable(OrderFormable $orderFormable): bool
    {
        return $this->orderRepository->create(
            $this->orderDTOFactory->createOrderFormableDTO(
                type: $orderFormable->type(),
                items: $orderFormable->items(),
                paymentMethod: $orderFormable->paymentMethod() ?? 'asd',
                annotation: $orderFormable->annotation(),
            ),
        );
    }
}
