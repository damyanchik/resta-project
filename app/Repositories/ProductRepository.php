<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Traits\IndexHandling;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface
{
    use IndexHandling;

    public function __construct(protected Product $model)
    {
    }
}
