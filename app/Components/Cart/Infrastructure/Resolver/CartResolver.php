<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Resolver;

use App\Components\Cart\Domain\DTO\CartItemAvailableDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Product\Domain\Exception\ProductAvailabilityException;
use App\Components\Product\Infrastructure\Validation\ProductValidation;
use Illuminate\Support\Collection;

class CartResolver
{
    /**
     * @param Collection<int, CartItemFormableDTO> $cartItemFormableDTOs
     * @param Collection<string, CartItemAvailableDTO> $cartItemAvailableDTOs
     * @return Collection<int, CartItemFormableDTO>
     */
    public function resolveItemsBetweenRepositoryAndSession(
        Collection $cartItemFormableDTOs,
        Collection $cartItemAvailableDTOs,
    ): Collection
    {
        return $cartItemFormableDTOs
            ->map(function ($item) use ($cartItemAvailableDTOs) {
                $product = $cartItemAvailableDTOs->get($item->productUuid);

                try {
                    ProductValidation::issetProduct($product);
                    ProductValidation::isAvailableProduct($product->isAvailable);
                    ProductValidation::isProductStockHigherOrEqual(
                        needed: $item->quantity,
                        stock: $product->stock,
                        isUnlimited: $product->isUnlimited,
                    );
                } catch (ProductAvailabilityException) {
                    return null;
                }

                //todo: opcja dot product stock, jezeli jest cos dostpenego to daje pelny

                return $item;
            })
            ->filter(fn($item) => !empty($item));
    }

    /**
     * @param CartItemFormableDTO $cartItemFormableDTO
     * @param Collection<CartItemFormableDTO> $cartItemFormableDTOs
     * @return Collection<CartItemFormableDTO>
     */
    public function resolveAssigningNewItemToCartItems(
        CartItemFormableDTO $cartItemFormableDTO,
        Collection          $cartItemFormableDTOs,
    ): Collection
    {
        return $cartItemFormableDTOs
            ->filter(fn($cartItem) => $cartItem->productUuid !== $cartItemFormableDTO->productUuid)
            ->push($cartItemFormableDTO);
    }
}
