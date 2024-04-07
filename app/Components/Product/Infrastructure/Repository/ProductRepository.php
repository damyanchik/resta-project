<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Repository;

use App\Components\Common\EloquentRepository\AbstractRepository;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Domain\Model\Product;

class ProductRepository extends AbstractRepository implements ProductRepository
{
    public function __construct(protected readonly Product $model)
    {
    }
}
