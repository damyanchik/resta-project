<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\DTO;

use App\Components\Common\DTO\PriceDTO;

class ProductDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly int $stock,
        public readonly PriceDTO $price,
        public readonly bool $isUnlimited,
        public readonly bool $isVegetarian,
        public readonly bool $isSpicy,
        public readonly bool $isAvailable,
        public readonly ?string $categoryUuid,
        public readonly int $orderNr,
    )
    {
    }
}
