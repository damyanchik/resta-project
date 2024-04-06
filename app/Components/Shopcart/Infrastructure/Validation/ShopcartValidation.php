<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Validation;

use App\Components\Shopcart\Domain\DTO\ShopcartDTO;
use App\Components\Shopcart\Domain\Exception\ShopcartException;

class ShopcartValidation
{
    public static function isProduct($product)
    {
        if ($product === null) {
            throw ShopcartException::notFound('Product not found.');
        }
    }

    public static function isAvailableProduct(ShopcartDTO $shopcartDTO)
    {
        if ($shopcartDTO) {
            throw ShopcartException::unavailable();
        }
    }

    public static function isProductStockHigherOrEqual()
    {
        if ($shopcartDTO->quantity <= 0 || $product->is_unlimited) {
            throw ShopcartException::notEnoughOnStock();
        }
    }
}
