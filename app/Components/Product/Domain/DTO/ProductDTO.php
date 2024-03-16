<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\DTO;

class ProductDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly int $stock,
        public readonly int $price,
        public readonly int $isUnlimited,
        public readonly int $isVegetarian,
        public readonly int $isSpicy,
        public readonly int $isAvailable,
        public readonly int $categoryId,
        public readonly int $orderNr,
    )
    {
    }
}
