<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Factory;

use App\Components\Product\Application\DTO\ProductFormable;
use App\Components\Product\Domain\DTO\ProductFormableDTO;

class ProductDTOFactory
{
    public function createProductFormableDTO(ProductFormable $productFormable): ProductFormableDTO
    {
        return new ProductFormableDTO(
            name: $productFormable->name(),
            description: $productFormable->description(),
            stock: $productFormable->stock(),
            price: $productFormable->price(),
            rate: $productFormable->rate(),
            isUnlimited: $productFormable->isUnlimited(),
            isVegetarian: $productFormable->isVegetarian(),
            isSpicy: $productFormable->isSpicy(),
            isAvailable: $productFormable->isAvailable(),
            categoryUuid: $productFormable->categoryUuid(),
            orderNr: $productFormable->orderNr(),
        );
    }
}
