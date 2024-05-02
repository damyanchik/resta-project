<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory;

use App\Components\Order\Domain\DTO\OrderEntryItemDTO;
class OrderItemDTOFactory
{
    public function createOrderItemBasicDTO(
        string $productUuid,
        int $quantity,
    ): OrderEntryItemDTO
    {
        return new OrderEntryItemDTO(
            productUuid: $productUuid,
            quantity: $quantity,
        );
    }
}
