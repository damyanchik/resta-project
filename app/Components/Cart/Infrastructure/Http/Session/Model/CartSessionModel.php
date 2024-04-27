<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Session\Model;

use Illuminate\Support\Collection;

class CartSessionModel
{
    /**
     * @param Collection<CartItemSessionModel> $sessionCartItems
     */
    public function __construct(
        public readonly Collection $sessionCartItems,
    )
    {
    }

    public function toArray()
    {
        return [
            'items' => $this->sessionCartItems->map(fn($item) => $item->toArray())->toArray(),
        ];
    }
}
