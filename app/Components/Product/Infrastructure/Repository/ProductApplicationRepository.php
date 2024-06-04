<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Repository;

use App\Components\Common\EloquentRepository\AbstractRepository;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Domain\DTO\ProductAvailableDTO;
use App\Components\Product\Domain\DTO\ProductDTO;
use App\Components\Product\Domain\Model\Product;
use App\Components\Product\Infrastructure\Mapper\ProductModelMapper;
use Illuminate\Support\Collection;

class ProductApplicationRepository extends AbstractRepository implements ProductRepository
{
    public function __construct(
        protected readonly Product          $model,
        private readonly ProductModelMapper $productModelMapper,
    )
    {
    }

    public function getProductDTO(string $uuid): ?ProductDTO
    {
        $product = $this->findByUuid($uuid);

        return $product
            ? $this->productModelMapper->toProductDTO($product)
            : null;
    }
}
