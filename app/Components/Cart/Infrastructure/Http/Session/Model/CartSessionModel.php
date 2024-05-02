<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Session\Model;

use Illuminate\Support\Collection;

class CartSessionModel
{
    /**
     * @param Collection<CartItemSessionModel> $sessionCartItems
     * @param object|null $discount
     */
    public function __construct(
        public readonly Collection $sessionCartItems,
        public readonly ?object $discount = null,
    )
    {
    }

    public function toArray()
    {
        return [
            'orderEntryItemDTOs' => $this->sessionCartItems->map(fn($item) => $item->toArray())->toArray(),
            'discount'
        ];
    }
}
