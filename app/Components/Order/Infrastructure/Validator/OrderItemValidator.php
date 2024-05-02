<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Validator;

use App\Components\Product\Domain\DTO\ProductBasicDTO;
use App\Components\Product\Domain\Exception\ProductAvailabilityException;
use App\Components\Product\Domain\Exception\ProductStockException;
use App\Components\Product\Infrastructure\Validation\ProductValidation;

class OrderItemValidator
{
    /**
     * @throws ProductAvailabilityException
     * @throws ProductStockException
     */
    public static function orderItemAvailability(ProductBasicDTO $productBasicDTO, int $quantity): void
    {
        ProductValidation::issetProduct($productBasicDTO);
        ProductValidation::isAvailableProduct($productBasicDTO->isAvailable);
        ProductValidation::isProductStockHigherOrEqual(
            needed: $quantity,
            stock: $productBasicDTO->stock,
            isUnlimited: $productBasicDTO->isUnlimited,
        );
    }
}
