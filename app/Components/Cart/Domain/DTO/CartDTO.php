<?php

declare(strict_types=1);

namespace App\Components\Cart\Domain\DTO;

use Akaunting\Money\Money;
use Illuminate\Support\Collection;

class CartDTO
{
    /**
     * @param Collection<CartItemDTO> $items
     * @param object|null $discount
     */
    public function __construct(
        public readonly Collection $items,
        public readonly ?object $discount = null,
    )
    {
    }

    public function countPositions(): int
    {
        return $this->items->count();
    }

    public function sumTotal(): Money
    {
        return Money::EUR($this->items->sum(fn ($item) => $item->sumGrossPrice()->getAmount()));
    }

    public function sumSubtotal(): Money
    {
        return Money::EUR($this->items->sum(fn ($item) => $item->sumNettPrice()->getAmount()));
    }
}
