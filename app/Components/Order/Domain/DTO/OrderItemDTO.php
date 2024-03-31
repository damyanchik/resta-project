<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use Akaunting\Money\Money;
use App\Components\Order\Domain\Enum\OrderItemStatusEnum;

class OrderItemDTO
{
    public function __construct(
        public readonly string $productUuid,
        public readonly Money $subtotalUnitPrice,
        public readonly Money $totalUnitPrice,
        public readonly Money $subtotalPrice,
        public readonly Money $totalPrice,
        public readonly int $quantity,
        public readonly OrderItemStatusEnum $status,
        public readonly string $annotation,
        public readonly int $orderNr,
    )
    {
    }
}
