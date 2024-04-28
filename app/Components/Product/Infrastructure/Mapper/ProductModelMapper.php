<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Mapper;

use App\Components\Common\DTO\PriceDTO;
use App\Components\Finance\Application\Calculator\PriceCalculator;
use App\Components\Product\Domain\DTO\ProductAvailableDTO;
use App\Components\Product\Domain\DTO\ProductBasicDTO;
use App\Components\Product\Domain\DTO\ProductDTO;
use App\Components\Product\Domain\Model\Product;
use Illuminate\Support\Collection;

class ProductModelMapper
{
    public function __construct(
        private readonly PriceCalculator $priceCalculator,
    )
    {
    }

    /**
     * @param Collection<Product> $products
     * @return Collection<ProductAvailableDTO>
     */
    public function toProductAvailabilityDTOs(Collection $products): Collection
    {
        return $products->mapWithKeys(function ($item) {
            return [$item->uuid => new ProductAvailableDTO(
                stock: $item->stock,
                isUnlimited: $item->is_unlimited,
                isAvailable: $item->is_available,
            )];
        });
    }

    /**
     * @param Collection<Product> $products
     * @return Collection<ProductBasicDTO>
     */
    public function toProductBasicDTOs(Collection $products): Collection
    {
        return $products->mapWithKeys(function ($item) {
            return [$item->uuid => new ProductBasicDTO(
                price: $item->price,
                rate: $item->rate,
                stock: $item->stock,
                isUnlimited: $item->is_unlimited,
                isAvailable: $item->is_available,
                categoryUuid: $item->category_uuid,
            )];
        });
    }

    public function toProductDTO(Product $product): ProductDTO
    {
        return new ProductDTO(
            name: $product->name,
            description: $product->description,
            stock: $product->stock,
            price: new PriceDTO(
                nett: $this->priceCalculator->calculateNettFromGross($product->price, $product->rate),
                gross: $product->price,
                rate: $product->rate,
            ),
            isUnlimited: $product->is_unlimited,
            isVegetarian: $product->is_vegetarian,
            isSpicy: $product->is_spicy,
            isAvailable: $product->is_available,
            categoryUuid: $product->category_uuid,
            orderNr: $product->order_nr,
        );
    }
}
