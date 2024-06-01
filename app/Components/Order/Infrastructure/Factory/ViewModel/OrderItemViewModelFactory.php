<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory\ViewModel;

use App\Components\Order\Domain\DTO\OrderItemDTO;
use App\Components\Order\Presentation\ViewModel\OrderItemViewModel;

class OrderItemViewModelFactory
{
    public function createOrderItemViewModelByOrderItemDTO(OrderItemDTO $orderItemDTO): OrderItemViewModel
    {
        return new OrderItemViewModel(
            productUuid: $orderItemDTO->productUuid,
            subtotalUnitPrice: $orderItemDTO->sumNettPrice->render(),
            totalUnitPrice: $orderItemDTO->sumGrossPrice->render(),
            subtotalPrice: $orderItemDTO->subtotalPrice->render(),
            totalPrice: $orderItemDTO->totalPrice->render(),
            quantity: $orderItemDTO->quantity,
            status: $orderItemDTO->status->value,
            annotation: $orderItemDTO->annotation,
            orderNr: $orderItemDTO->orderNr,
        );
    }
}
