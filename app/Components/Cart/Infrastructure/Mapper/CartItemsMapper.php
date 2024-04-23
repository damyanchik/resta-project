<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Mapper;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use Illuminate\Support\Collection;

class CartItemsMapper
{
    public function toFormableDTOs(array $cartItems): Collection
    {
        return (new Collection($cartItems))
            ->map(function ($item, $uuid) {
                return new CartItemFormableDTO(
                    quantity: $item['quantity'],
                    productUuid: $uuid,
                );
            })
            ->values();
    }

    public function fromCartFormableDTOs(Collection $cartItems): array
    {
        return $cartItems->mapWithKeys(function ($item) {
                return [$item->productUuid => ['quantity' => $item->quantity]] ;
            })
            ->toArray();
    }
}
