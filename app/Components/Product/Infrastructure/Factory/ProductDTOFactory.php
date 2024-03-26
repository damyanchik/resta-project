<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Factory;

use App\Components\Product\Application\DTO\ProductFormable;
use App\Components\Product\Domain\DTO\ProductDTO;
use App\Components\Product\Domain\DTO\ProductFormableDTO;
use App\Components\Product\Domain\Model\Product;

class ProductDTOFactory
{
    public function createForFormation(ProductFormable $productFormable): ProductFormableDTO
    {
        return new ProductFormableDTO(
            name: $productFormable->productName(),
            description: $productFormable->productDescription(),
            stock: $productFormable->productStock(),
            price: $productFormable->productPrice(),
            isUnlimited: $productFormable->productIsUnlimited(),
            isVegetarian: $productFormable->productIsVegetarian(),
            isSpicy: $productFormable->productIsSpicy(),
            isAvailable: $productFormable->productIsAvailable(),
            categoryId: $productFormable->productCategoryId(),
            orderNr: $productFormable->productOrderNr(),
        );
    }

    public function createForFetched(Product $product): ProductDTO
    {
        return new ProductDTO(
            name: $product->name,
            description: $product->description,
            stock: $product->stock,
            price: $product->price,
            isUnlimited: $product->is_unlimited,
            isVegetarian: $product->is_vegetarian,
            isSpicy: $product->is_spicy,
            isAvailable: $product->is_available,
            categoryId: $product->category_id,
            orderNr: $product->order_nr,
        );
    }
}
