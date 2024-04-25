<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Facade;

use App\Components\Product\Application\DTO\ProductFormable;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Domain\DTO\ProductDTO;
use App\Components\Product\Infrastructure\Factory\ProductDTOApplicationFactory;

class ProductFacade
{
    public function __construct(
        private readonly ProductRepository            $productRepository,
        private readonly ProductDTOApplicationFactory $productDTOFactory,
    )
    {
    }

    public function createByFormable(ProductFormable $productFormable): bool
    {
        return $this->productRepository->create($this->productDTOFactory->createProductFormationDTO($productFormable));
    }

    public function updateByFormable(ProductFormable $productFormable, string $uuid): bool
    {
        return $this->productRepository->update(
            data: $this->productDTOFactory->createProductFormationDTO($productFormable),
            uuid: $uuid,
        );
    }

    public function delete(string $uuid): bool
    {
        return $this->productRepository->delete($uuid);
    }

    public function getSingleByUuid(string $uuid): ?ProductDTO
    {
        $product = $this->productRepository->getByUuidOrFail($uuid);

        if ($product === null) {
            return null;
        }

        return $this->productDTOFactory->createProductDTO($product);
    }
}
