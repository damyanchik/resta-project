<?php

declare(strict_types=1);

namespace App\Components\Product\Application\Repository;

use App\Components\Common\EloquentRepository\RepositoryContract;
use App\Components\Product\Domain\DTO\ProductDTO;
use Illuminate\Support\Collection;

interface ProductRepository extends RepositoryContract
{
    public function getProductAvailabilityDTOs(array $uuids): Collection;
    public function getProductBasicDTOs(array $uuids): Collection;
    public function getProductDTO(string $uuid): ?ProductDTO;
}
