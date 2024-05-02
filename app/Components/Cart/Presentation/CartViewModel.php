<?php

declare(strict_types=1);

namespace App\Components\Cart\Presentation;

use Akaunting\Money\Money;
use Illuminate\Support\Collection;

class CartViewModel
{
    public function __construct(
        private readonly Collection $items,
        private readonly int $positions,
        private readonly Money $subtotal,
        private readonly Money $total,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'orderEntryItemDTOs' => $this->items->toArray(),
            'positions' => $this->positions,
            'subtotal' => $this->subtotal->format(),
            'total' => $this->total->format(),
        ];
    }
}
