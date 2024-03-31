<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use App\Components\Order\Domain\Enum\OrderItemStatusEnum;

class OrderItemDTO
{
    public function __construct(
        public readonly string $productUuid,
        public readonly int $subtotalUnitPrice,
        public readonly int $totalUnitPrice,
        public readonly int $subtotalPrice,
        public readonly int $totalPrice,
        public readonly int $quantity,
        public readonly OrderItemStatusEnum $status,
        public readonly string $annotation,
        public readonly int $orderNr,
    )
    {
    }
}
