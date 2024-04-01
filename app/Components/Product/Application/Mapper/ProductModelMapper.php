<?php

declare(strict_types=1);

namespace App\Components\Product\Application\Mapper;

use Illuminate\Support\Collection;

interface ProductModelMapper
{
    public function withItemsToOrderItem(Collection $products, Collection $items): Collection;
}
