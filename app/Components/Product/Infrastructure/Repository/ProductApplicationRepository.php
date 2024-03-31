<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Repository;

use App\Components\Common\EloquentRepository\AbstractRepository;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Domain\Model\Product;
use Illuminate\Support\Collection;

class ProductApplicationRepository extends AbstractRepository implements ProductRepository
{
    public function __construct(private readonly Product $model)
    {
    }

    public function getByUuids(array $uuids, array $columns = ['*']): Collection
    {
        return $this->model
            ->newQuery()
            ->select($columns)
            ->whereIn('uuid', $uuids)
            ->get();
    }
}
