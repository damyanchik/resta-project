<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory;

use App\Components\Order\Application\DTO\OrderFormable;
use App\Components\Order\Domain\DTO\OrderFormableDTO;

class OrderDTOFactory
{
    public function createForFormation(OrderFormable $orderFormable): OrderFormableDTO
    {
        return new OrderFormableDTO(
            status: $orderFormable->status(),
            type: $orderFormable->type(),
            subtotalAmount: (int) $orderFormable->subtotalAmount(),
            totalAmount: (int) $orderFormable->totalAmount(),
            paymentMethod: $orderFormable->paymentMethod(),
            isPaid: $orderFormable->isPaid(),
            annotation: $orderFormable->annotation(),
        );
    }
}
