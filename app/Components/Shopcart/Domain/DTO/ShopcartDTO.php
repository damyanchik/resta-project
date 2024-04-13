<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Domain\DTO;

use Akaunting\Money\Money;
use Illuminate\Support\Collection;

class ShopcartDTO
{
    public function __construct(
        public readonly Collection $products,
    )
    {
    }

    public function countPositions(): int
    {
        return $this->products->count();
    }

    public function sumTotal(): Money
    {
        return Money::EUR($this->products->sum(fn ($product) => $product->grossPrice->getAmount()));
    }

    public function sumSubtotal(): Money
    {
        return Money::EUR($this->products->sum(fn ($product) => $product->nettPrice->getAmount()));
    }
}
