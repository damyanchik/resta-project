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

            $product = $productShortDTOs->get('928b48e3-ed13-4991-bf3d-c0795e7ceed4');
//            try {
                ShopcartValidation::isProduct($product);
                ShopcartValidation::isAvailableProduct($product);
                ShopcartValidation::isProductStockHigherOrEqual($item, $product);
//            } catch (ShopcartException) {
//                continue;
//            }

        });
    }
}
