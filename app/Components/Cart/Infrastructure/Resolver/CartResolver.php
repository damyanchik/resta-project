<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Resolver;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Domain\Exception\CartException;
use App\Components\Cart\Infrastructure\Http\Session\Model\CartItemSessionModel;
use App\Components\Cart\Infrastructure\Validation\CartValidation;
use App\Components\Product\Domain\DTO\ProductAvailableDTO;
use Illuminate\Support\Collection;

class CartResolver
{

    /**
     * @param Collection<CartItemSessionModel> $cartItems
     * @param Collection<ProductAvailableDTO> $productAvailableDTOs
     * @return Collection<CartItemSessionModel>
     */
    public function resolveBetweenRepositoryAndSession(Collection $cartItems, Collection $productAvailableDTOs): Collection
    {
        return $cartItems->map(function ($item) use ($productAvailableDTOs) {
            $product = $productAvailableDTOs->get($item->productUuid);

            try {
                CartValidation::isProduct($product);
                CartValidation::isAvailableProduct($product);
                CartValidation::isProductStockHigherOrEqual($item, $product);
            } catch (CartException) {
                return null;
            }

            //+ opcja dot product stock, jezeli jest cos dostpenego to daje pelny

            return $item;
        })->filter(fn($item) => ! empty($item));
    }

    /**
     * @param CartItemFormableDTO $itemFormableDTO
     * @param Collection<CartItemFormableDTO> $cartItems
     * @return Collection<CartItemFormableDTO>
     */
    public function resolveAssigningNewItemToCartItems(
        CartItemFormableDTO $itemFormableDTO,
        Collection $cartItems
    ): Collection
    {
        return $cartItems
            ->filter(fn ($cartItem) => $cartItem->productUuid !== $itemFormableDTO->productUuid)
            ->push($itemFormableDTO);
    }

    public function resolveItemInCart()
    {

    }
}
