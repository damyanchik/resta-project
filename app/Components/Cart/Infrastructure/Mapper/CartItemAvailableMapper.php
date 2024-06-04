<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Mapper;

use App\Components\Cart\Domain\DTO\CartItemAvailableDTO;
use App\Components\Product\Domain\Model\Product;

class CartItemAvailableMapper
{
    public function fromProductModel(Product $product): CartItemAvailableDTO
    {
        return new CartItemAvailableDTO(
            stock: $product->stock,
            isUnlimited: $product->is_unlimited,
            isAvailable: $product->is_available,
        );
    }
}
