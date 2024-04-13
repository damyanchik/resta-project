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

    public function createProduct(ProductFormable $productFormable): bool
    {
        $productDto = $this->productDTOFactory->createProductFormationDTO($productFormable);

        return $this->productRepository->create($productDto);
    }

    public function updateProduct(ProductFormable $productFormable, string $uuid): bool
    {
        $productDto = $this->productDTOFactory->createProductFormationDTO($productFormable);

        return $this->productRepository->update($productDto, $uuid);
    }

    public function deleteUser(string $uuid): bool
    {
        return $this->productRepository->delete($uuid);
    }

    public function getSingleProduct(string $uuid): ?ProductDTO
    {
        $product = $this->productRepository->getByUuidOrFail($uuid);

        if ($product === null) {
            return null;
        }

        return $this->productDTOFactory->createProductDTO($product);
    }

}
