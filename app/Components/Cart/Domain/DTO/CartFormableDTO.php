<?php

declare(strict_types=1);

namespace App\Components\Cart\Domain\DTO;

use Illuminate\Support\Collection;

class CartFormableDTO
{
    /**
     * @param Collection<CartItemFormableDTO> $cartFormableItemDTOs
     * @param object|null $discount
     */
    public function __construct(
        public readonly Collection $cartFormableItemDTOs,
        public readonly ?object    $discount = null,
    )
    {
    }
}
