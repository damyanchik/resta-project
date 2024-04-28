<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Validation;

use App\Components\Product\Domain\Exception\ProductAvailabilityException;
use App\Components\Product\Domain\Exception\ProductStockException;

abstract class ProductValidation
{
    public static function issetProduct(?object $product): void
    {
        if ($product === null) {
            throw ProductAvailabilityException::notFound();
        }
    }

    public static function isAvailableProduct(bool $isAvailable): void
    {
        if (! $isAvailable) {
            throw ProductAvailabilityException::unavailable();
        }
    }

    public static function isProductStockHigherOrEqual(
        int $needed,
        int $stock,
        bool $isUnlimited,
    ): void
    {
        if (self::stockNotEnough($needed, $stock, $isUnlimited)) {
            throw ProductStockException::notEnoughOnStock();
        }
    }

    private static function stockNotEnough(
        int $needed,
        int $stock,
        bool $isUnlimited,
    ): bool
    {
        if ($needed <= $stock) {
            return false;
        }

        if ($isUnlimited) {
            return false;
        }

        return true;
    }
}
