<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Facade;

use App\Components\Product\Application\DTO\ProductFormable;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Domain\DTO\ProductDTO;
use App\Components\Product\Infrastructure\Factory\ProductDTOFactory;

class ProductFacade
{
    public function __construct(
        private readonly ProductRepository  $productRepository,
        private readonly ProductDTOFactory  $productDTOFactory,
    )
    {
    }

    public function createByFormable(ProductFormable $productFormable): bool
    {
        return $this->productRepository->create($this->productDTOFactory->createProductFormableDTO($productFormable));
    }

    public function updateByFormable(ProductFormable $productFormable, string $uuid): bool
    {
        return $this->productRepository->update(
            data: $this->productDTOFactory->createProductFormableDTO($productFormable),
            uuid: $uuid,
        );
    }

    public function deleteByUuid(string $uuid): bool
    {
        return $this->productRepository->delete($uuid);
    }

    public function getProductByUuid(string $uuid): ?ProductDTO
    {
        return $this->productRepository->getProductDTO($uuid);
    }
}
