<?php

declare(strict_types=1);

namespace App\Components\Cart\Domain\DTO;

use Illuminate\Support\Collection;

class CartFormableDTO
{
    public function __construct(
        public readonly Collection $cartFormableItems,
        public readonly ?object $discount = null,
    )
    {
    }
}
