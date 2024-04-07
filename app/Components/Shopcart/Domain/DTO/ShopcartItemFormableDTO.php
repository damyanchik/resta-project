<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Domain\DTO;

class ShopcartItemFormableDTO
{
    public function __construct(
        public readonly int $quantity,
        public readonly string $productUuid,
    )
    {
    }
}
