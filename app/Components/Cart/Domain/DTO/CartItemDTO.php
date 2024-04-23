<?php

declare(strict_types=1);

namespace App\Components\Cart\Domain\DTO;

use Akaunting\Money\Money;

class CartItemDTO
{
    public function __construct(
        public readonly string $name,
        public readonly int $quantity,
        public readonly Money $nettPrice,
        public readonly Money $grossPrice,
        public readonly bool $isVegetarian,
        public readonly bool $isSpicy,
    )
    {
    }

    public function sumNettPrice(): Money
    {
        return $this->nettPrice->multiply($this->quantity);
    }

    public function sumGrossPrice(): Money
    {
        return $this->grossPrice->multiply($this->quantity);
    }
}
