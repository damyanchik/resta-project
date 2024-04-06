<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Domain\DTO;

class ShopcartItemDTO
{
    public function __construct(
        public readonly string $productUuid,
        public readonly int $quantity,
        public readonly string $annotation,
    )
    {
    }
}
