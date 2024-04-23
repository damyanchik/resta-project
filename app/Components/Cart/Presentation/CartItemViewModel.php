<?php

declare(strict_types=1);

namespace App\Components\Cart\Presentation;

use Akaunting\Money\Money;

class CartItemViewModel
{
    public function __construct(
        public readonly string $name,
        public readonly int $quantity,
        public readonly Money $nettPrice,
        public readonly Money $grossPrice,
        public readonly bool $isVegetarian,
        public readonly bool $isSpicy,
        public readonly Money $sumNettPrice,
        public readonly Money $sumGrossPrice,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'quantity' => $this->quantity,
            'nett_price' => $this->nettPrice->format(),
            'gross_price' => $this->grossPrice->format(),
            'is_vegetarian' => $this->isVegetarian,
            'is_spicy' => $this->isSpicy,
            'sum_nett_price' => $this->sumNettPrice->format(),
            'sum_gross_price' => $this->sumNettPrice->format(),
        ];
    }
}
