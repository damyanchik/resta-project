<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use App\Components\Order\Domain\Enum\OrderItemStatusEnum;

class OrderItemDTO
{
    public function __construct(
        public readonly string $productUuid,
        public readonly int $subtotal_unit_price,
        public readonly int $total_unit_price,
        public readonly int $subtotal_price,
        public readonly int $total_price,
        public readonly int $quantity,
        public readonly OrderItemStatusEnum $status,
        public readonly string $annotation,
        public readonly int $orderNr,
    )
    {
    }
}
