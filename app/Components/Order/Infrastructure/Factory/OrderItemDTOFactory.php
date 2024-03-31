<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory;

use App\Components\Order\Domain\DTO\OrderItemDTO;

class OrderItemDTOFactory
{
    public function createOrderItemDTO(array $attributes): OrderItemDTO
    {
        return new OrderItemDTO(
            productUuid: $attributes['product_uuid'],
            subtotalUnitPrice: $attributes['subtotal_unit_price'],
            totalUnitPrice: $attributes['total_unit_price'],
            subtotalPrice: $attributes['subtotal_price'],
            totalPrice: $attributes['total_price'],
            quantity: $attributes['quantity'],
            status: $attributes['status'],
            annotation: $attributes['annotation'],
            orderNr: $attributes['orderNr'],
        );
    }
}
