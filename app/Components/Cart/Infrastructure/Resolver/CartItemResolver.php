<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Resolver;

use App\Components\Cart\Domain\Exception\CartException;
use App\Components\Cart\Infrastructure\Validation\CartValidation;
use Illuminate\Support\Collection;

class CartItemResolver
{
    public function betweenRepositoryAndSession(Collection $cartDTOs, Collection $productReloadDTO): Collection
    {
        return $cartDTOs->map(function ($item) use ($productReloadDTO) {
            $product = $productReloadDTO->get($item->productUuid);

            try {
                CartValidation::isProduct($product);
                CartValidation::isAvailableProduct($product);
                CartValidation::isProductStockHigherOrEqual($item, $product);
            } catch (CartException) {
                return null;
            }

            //+1 opcja dot product stock, jezeli jest cos dostpenego to daje pelny

            return $item;
        })->filter(fn($item) => ! empty($item));
    }
}
