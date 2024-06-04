<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Validator;

use App\Components\Order\Domain\DTO\OrderedProductDTO;
use App\Components\Product\Domain\Exception\ProductAvailabilityException;
use App\Components\Product\Domain\Exception\ProductStockException;
use App\Components\Product\Infrastructure\Validation\ProductValidation;

class OrderItemValidator
{
    /**
     * @throws ProductAvailabilityException
     * @throws ProductStockException
     */
    public static function orderItemAvailability(OrderedProductDTO $orderedProductDTO, int $quantity): void
    {
        ProductValidation::issetProduct($orderedProductDTO);
        ProductValidation::isAvailableProduct($orderedProductDTO->isAvailable);
        ProductValidation::isProductStockHigherOrEqual(
            needed: $quantity,
            stock: $orderedProductDTO->stock,
            isUnlimited: $orderedProductDTO->isUnlimited,
        );
    }
}
