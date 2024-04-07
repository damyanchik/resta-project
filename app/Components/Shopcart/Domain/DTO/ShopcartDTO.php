<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Domain\DTO;

use Illuminate\Support\Collection;

class ShopcartDTO
{
    public function __construct(
        public readonly Collection $products,
    )
    {
    }

    public function countAll()
    {

    }

    public function sumTotal()
    {

    }

    public function sumSubtal()
    {

    }
}
