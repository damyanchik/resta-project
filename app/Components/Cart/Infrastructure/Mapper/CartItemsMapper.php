<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Mapper;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use Illuminate\Support\Collection;

class CartItemsMapper
{
    public function toFormableDTOs(array $shopcartItems): Collection
    {
        return (new Collection($shopcartItems))
            ->map(function ($item, $uuid) {
                return new CartItemFormableDTO(
                    quantity: $item['quantity'],
                    productUuid: $uuid,
                );
            })
            ->values();
    }

    public function fromShopcartFormableDTOs(Collection $shopcartItems): array
    {
        return $shopcartItems->mapWithKeys(function ($item) {
                return [$item->productUuid => ['quantity' => $item->quantity]] ;
            })
            ->toArray();
    }
}
