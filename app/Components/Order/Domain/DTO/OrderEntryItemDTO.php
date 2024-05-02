<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

class OrderEntryItemDTO
{
    public function __construct(
        public readonly string $productUuid,
        public readonly int $quantity
    )
    {
    }
}
