<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Mapper;

use App\Components\Product\Domain\DTO\ProductAvailableDTO;
use App\Components\Product\Domain\Model\Product;
use Illuminate\Support\Collection;

class ProductModelMapper
{
    /**
     * @param Collection<Product> $products
     * @return Collection<ProductAvailableDTO>
     */
    public function toProductAvailabilityDTO(Collection $products): Collection
    {
        return $products->mapWithKeys(function ($item) {
            return [$item->uuid => new ProductAvailableDTO(
                stock: $item->stock,
                isUnlimited: $item->is_unlimited,
                isAvailable: $item->is_available,
            )];
        });
    }
}
