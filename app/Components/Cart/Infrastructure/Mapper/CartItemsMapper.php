<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Mapper;

use App\Components\Cart\Domain\DTO\CartItemDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Domain\DTO\CartProductReloadDTO;
use App\Components\Cart\Domain\Enum\CartAttributeEnum;
use App\Components\Product\Application\Repository\ProductRepository;
use Illuminate\Support\Collection;

class CartItemsMapper
{
    public function __construct(private readonly ProductRepository $productRepository)
    {
    }

    public function toFormableDTOs(array $cartItems): Collection
    {
        return (new Collection($cartItems))
            ->map(function ($item, $uuid) {
                return new CartItemFormableDTO(
                    quantity: $item[CartAttributeEnum::QUANTITY->value],
                    productUuid: $uuid,
                );
            })
            ->values();
    }

    public function fromCartFormableDTOs(Collection $cartItems): array
    {
        return $cartItems->mapWithKeys(function ($item) {
            return [$item->productUuid => [CartAttributeEnum::QUANTITY->value => $item->quantity]];
        })->toArray();
    }

    public function toCartProductReloadDTOs(array $uuids): Collection
    {
        $product = $this->productRepository->getByUuids(
            uuids: $uuids,
            columns: ['uuid', 'stock', 'is_available', 'is_unlimited'],
        );

        return $product->mapWithKeys(function ($item) {
            return [$item->uuid => new CartProductReloadDTO(
                stock: $item->stock,
                isUnlimited: $item->is_unlimited,
                isAvailable: $item->is_available,
            )];
        });
    }

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
