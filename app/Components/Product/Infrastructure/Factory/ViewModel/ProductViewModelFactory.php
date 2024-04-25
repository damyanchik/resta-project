<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Factory\ViewModel;

use App\Components\Product\Domain\DTO\ProductDTO;
use App\Components\Product\Presentation\ViewModel\ProductViewModel;

class ProductViewModelFactory
{
    public function createByProductDTO(ProductDTO $productDTO): ProductViewModel
    {
        return new ProductViewModel(
            name: $productDTO->name,
            description: $productDTO->description,
            stock: $productDTO->stock,
            price: $productDTO->price,
            isUnlimited: $productDTO->isUnlimited,
            isVegetarian: $productDTO->isVegetarian,
            isSpicy: $productDTO->isSpicy,
            isAvailable: $productDTO->isAvailable,
            categoryUuid: $productDTO->categoryUuid,
        );
    }
}
