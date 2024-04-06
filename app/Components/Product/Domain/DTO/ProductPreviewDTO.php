<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\DTO;

use Akaunting\Money\Money;

class ProductPreviewDTO
{
    public function __construct(
        public readonly string $uuid,
        public readonly string $name,
        public readonly int $stock,
        public readonly Money $price,
        public readonly bool $isVegetarian,
        public readonly bool $isSpicy,
    )
    {
    }
}
