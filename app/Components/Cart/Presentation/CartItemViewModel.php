<?php

declare(strict_types=1);

namespace App\Components\Cart\Presentation;

use Akaunting\Money\Money;
use App\Components\Common\DTO\PriceDTO;

class CartItemViewModel
{
    public function __construct(
        public readonly string $name,
        public readonly int $quantity,
        public readonly PriceDTO $price,
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
            'price' => [
                'nett' => $this->price->nett->format(),
                'gross' => $this->price->gross->format(),
                'rate' => $this->price->rate,
            ],
            'is_vegetarian' => $this->isVegetarian,
            'is_spicy' => $this->isSpicy,
            'sum_nett_price' => $this->sumNettPrice->format(),
            'sum_gross_price' => $this->sumGrossPrice->format(),
        ];
    }
}
