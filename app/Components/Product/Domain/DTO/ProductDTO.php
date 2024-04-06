<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\DTO;

use Akaunting\Money\Money;

class ProductDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly int $stock,
        public readonly Money $price,
        public readonly bool $isUnlimited,
        public readonly bool $isVegetarian,
        public readonly bool $isSpicy,
        public readonly bool $isAvailable,
        public readonly int $categoryUuid,
        public readonly int $orderNr,
    )
    {
    }
}
