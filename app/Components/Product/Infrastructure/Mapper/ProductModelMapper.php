<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Mapper;

use App\Components\Cart\Domain\Enum\CartAttributeEnum;
use App\Components\Cart\Domain\DTO\CartItemDTO;
use Illuminate\Support\Collection;

class ProductModelMapper
{
    public function toCartItemDTOs(Collection $products, array $cart): Collection
    {
        return $products->mapWithKeys(fn($product) => [$product->uuid => new CartItemDTO(
            name: $product->name,
            quantity: $cart[$product->uuid][CartAttributeEnum::QUANTITY->value],
            nettPrice: $product->price,
            grossPrice: $product->price,
            isVegetarian: $product->is_vegetarian,
            isSpicy: $product->is_spicy,
        )]);
    }
}
