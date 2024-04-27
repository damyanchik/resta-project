<?php

declare(strict_types=1);

namespace App\Components\Product\Application\Repository;

use App\Components\Common\EloquentRepository\RepositoryContract;
use Illuminate\Support\Collection;

interface ProductRepository extends RepositoryContract
{
    public function getProductAvailabilityDTOs(array $uuids): Collection;
}
