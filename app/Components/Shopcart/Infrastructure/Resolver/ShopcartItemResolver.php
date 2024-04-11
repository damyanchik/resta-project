<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Resolver;

use App\Components\Shopcart\Domain\Exception\ShopcartException;
use App\Components\Shopcart\Infrastructure\Validation\ShopcartValidation;
use Illuminate\Support\Collection;

class ShopcartItemResolver
{
    public function betweenRepositoryAndSession(Collection $shopcartDTOs, Collection $productShortDTOs): Collection
    {
        return $shopcartDTOs->map(function ($item) use ($productShortDTOs) {
            $product = $productShortDTOs->get($item->productUuid);

            try {
                ShopcartValidation::isProduct($product);
                ShopcartValidation::isAvailableProduct($product);
                ShopcartValidation::isProductStockHigherOrEqual($item, $product);
            } catch (ShopcartException) {
                return null;
            }

            //+1 opcja dot product stock, jezeli jest cos dostpenego to daje pelny

            return $item;
        })->filter(fn($item) => !empty($item));
    }
}
