<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Validation;

use App\Components\Cart\Domain\DTO\CartProductReloadDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Domain\Exception\CartException;

class CartValidation
{
    public static function isProduct(?object $cartItem): void
    {
        if ($cartItem === null) {
            throw CartException::notFound('Product not found.');
        }
    }

    public static function isAvailableProduct(CartProductReloadDTO $cartProductReloadDTO): void
    {
        if (! $cartProductReloadDTO->isAvailable) {
            throw CartException::unavailable();
        }
    }

    public static function isProductStockHigherOrEqual(
        CartItemFormableDTO      $cartItem,
        CartProductReloadDTO     $cartProductReloadDTO,
    ): void
    {
        if (self::stockNotEnough($cartItem, $cartProductReloadDTO)) {
            throw CartException::notEnoughOnStock();
        }
    }

    private static function stockNotEnough(
        CartItemFormableDTO      $cartItem,
        CartProductReloadDTO     $cartProductReloadDTO,
    ): bool
    {
        if ($cartItem->quantity <= $cartProductReloadDTO->stock) {
            return false;
        }

        if ($cartProductReloadDTO->isUnlimited) {
            return false;
        }

        return true;
    }
}
