<?php

declare(strict_types=1);

namespace App\Components\Product\Application\Repository;

use App\Components\Common\EloquentRepository\RepositoryContract;
use App\Components\Product\Domain\DTO\ProductDTO;

interface ProductRepository extends RepositoryContract
{public function getProductDTO(string $uuid): ?ProductDTO;
}
