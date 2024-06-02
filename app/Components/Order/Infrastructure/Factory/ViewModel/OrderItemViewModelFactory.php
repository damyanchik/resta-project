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
            unitNettPrice: $orderItemDTO->unitPrice->nett->render(),
            unitGrossPrice: $orderItemDTO->unitPrice->gross->render(),
            sumNettPrice: $orderItemDTO->sumNettPrice->render(),
            sumGrossPrice: $orderItemDTO->sumGrossPrice->render(),
            rate: $orderItemDTO->unitPrice->rate,
            quantity: $orderItemDTO->quantity,
            status: $orderItemDTO->status->value,
            message: $orderItemDTO->message,
            orderNr: $orderItemDTO->orderNr,
        );
    }
}
