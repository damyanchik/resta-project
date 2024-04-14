<?php

namespace App\Components\Product\Application\Mapper;

use Illuminate\Support\Collection;

interface ProductModelMapper
{
    public function toShopcartItemDTOs(Collection $products, array $shopcart): Collection;
}
