<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Factory;

use Akaunting\Money\Money;
use App\Components\Product\Application\DTO\ProductFormable;
use App\Components\Product\Application\Factory\ProductDTOFactory;
use App\Components\Product\Domain\DTO\ProductDTO;
use App\Components\Product\Domain\DTO\ProductFormableDTO;
use App\Components\Product\Domain\DTO\ProductShortDTO;
use App\Components\Product\Domain\Model\Product;
use App\Components\Product\Infrastructure\Repository\ProductApplicationRepository;
use Illuminate\Support\Collection;

class ProductDTOApplicationFactory implements ProductDTOFactory
{
    public function __construct(private readonly ProductApplicationRepository $productRepository)
    {
    }

    public function createProductFormationDTO(ProductFormable $productFormable): ProductFormableDTO
    {
        return new ProductFormableDTO(
            name: $productFormable->productName(),
            description: $productFormable->productDescription(),
            stock: $productFormable->productStock(),
            price: Money::EUR($productFormable->productPrice()),
            isUnlimited: $productFormable->productIsUnlimited(),
            isVegetarian: $productFormable->productIsVegetarian(),
            isSpicy: $productFormable->productIsSpicy(),
            isAvailable: $productFormable->productIsAvailable(),
            categoryUuid: $productFormable->productCategoryId(),
            orderNr: $productFormable->productOrderNr(),
        );
    }

    public function createProductDTO(Product $product): ProductDTO
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
            categoryUuid: $product->category_id,
            orderNr: $product->order_nr,
        );
    }

    public function createProductShortDTOs(array $uuids): Collection
    {
        $product = $this->productRepository->getByUuids(
            uuids: $uuids,
            columns: ['uuid', 'stock', 'is_available', 'is_unlimited'],
        );

        return $product->mapWithKeys(function ($item) {
            return [$item->uuid => new ProductShortDTO(
                stock: $item->stock,
                isUnlimited: $item->is_unlimited,
                isAvailable: $item->is_available,
            )];
        });
    }
}
