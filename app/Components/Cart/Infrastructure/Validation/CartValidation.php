<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Validation;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Domain\Exception\CartException;
use App\Components\Product\Domain\DTO\ProductAvailableDTO;

class CartValidation
{
    public static function issetProduct(?ProductAvailableDTO $productAvailableDTO): void
    {
        if ($productAvailableDTO === null) {
            throw CartException::notFound('Product not found.');
        }
    }

    public static function isAvailableProduct(ProductAvailableDTO $productAvailableDTO): void
    {
        if (! $productAvailableDTO->isAvailable) {
            throw CartException::unavailable();
        }
    }

    public static function isProductStockHigherOrEqual(
        CartItemFormableDTO $cartItem,
        ProductAvailableDTO $productAvailableDTO,
    ): void
    {
        if (self::stockNotEnough($cartItem, $productAvailableDTO)) {
            throw CartException::notEnoughOnStock();
        }
    }

    private static function stockNotEnough(
        CartItemFormableDTO $cartItem,
        ProductAvailableDTO $productAvailableDTO,
    ): bool
    {
        if ($cartItem->quantity <= $productAvailableDTO->stock) {
            return false;
        }

        if ($productAvailableDTO->isUnlimited) {
            return false;
        }

        return true;
    }
}
