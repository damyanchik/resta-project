<?php

namespace App\Components\Product\Application\Mapper;

use Illuminate\Support\Collection;

interface ProductModelMapper
{
    public function toCartItemDTOs(Collection $products, array $shopcart): Collection;
}
