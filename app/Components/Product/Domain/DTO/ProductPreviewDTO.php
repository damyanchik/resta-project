<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\DTO;

class ProductPreviewDTO
{
    public function __construct(
        public readonly string $uuid,
        public readonly string $name,
        public readonly int $price,
        public readonly int $isVegetarian,
        public readonly int $isSpicy,
    )
    {
    }
}
