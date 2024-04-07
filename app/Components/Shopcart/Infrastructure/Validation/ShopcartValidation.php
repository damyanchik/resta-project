<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Validation;

use App\Components\Product\Domain\DTO\ProductShortDTO;
use App\Components\Shopcart\Domain\DTO\ShopcartItemFormableDTO;
use App\Components\Shopcart\Domain\Exception\ShopcartException;

class ShopcartValidation
{
    public static function isProduct(?object $shopcartItem): void
    {
        if ($shopcartItem === null) {
            throw ShopcartException::notFound('Product not found.', 'uuid');
        }
    }

    public static function isAvailableProduct(ProductShortDTO $productShortDTO): void
    {
        if ($productShortDTO->isAvailable) {
            throw ShopcartException::unavailable();
        }
    }

    public static function isProductStockHigherOrEqual(
        ShopcartItemFormableDTO $shopcartItem,
        ProductShortDTO $productShortDTO,
    ): void
    {
        if (self::stockNotEnough($shopcartItem, $productShortDTO)) {
            throw ShopcartException::notEnoughOnStock();
        }
    }

    private static function stockNotEnough(
        ShopcartItemFormableDTO $shopcartItem,
        ProductShortDTO $productShortDTO,
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
