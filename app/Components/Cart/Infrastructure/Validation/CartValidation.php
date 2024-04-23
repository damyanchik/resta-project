<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Validation;

use App\Components\Product\Domain\DTO\ProductShortDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Domain\Exception\CartException;

class CartValidation
{
    public static function isProduct(?object $shopcartItem): void
    {
        if ($shopcartItem === null) {
            throw CartException::notFound('Product not found.');
        }
    }

    public static function isAvailableProduct(ProductShortDTO $productShortDTO): void
    {
        if (! $productShortDTO->isAvailable) {
            throw CartException::unavailable();
        }
    }

    public static function isProductStockHigherOrEqual(
        CartItemFormableDTO $shopcartItem,
        ProductShortDTO     $productShortDTO,
    ): void
    {
        if (self::stockNotEnough($shopcartItem, $productShortDTO)) {
            throw CartException::notEnoughOnStock();
        }
    }

    private static function stockNotEnough(
        CartItemFormableDTO $shopcartItem,
        ProductShortDTO     $productShortDTO,
    ): bool
    {
        if ($shopcartItem->quantity <= $productShortDTO->stock) {
            return false;
        }

        if ($productShortDTO->isUnlimited) {
            return false;
        }

        return true;
    }
}
