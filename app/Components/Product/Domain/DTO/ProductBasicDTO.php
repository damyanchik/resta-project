<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\DTO;

use Akaunting\Money\Money;

class ProductBasicDTO
{
    public function __construct(
        public readonly Money $price,
        public readonly int $rate,
        public readonly int $stock,
        public readonly bool $isUnlimited,
        public readonly bool $isAvailable,
        public readonly ?string $categoryUuid,
    )
    {
    }
}
