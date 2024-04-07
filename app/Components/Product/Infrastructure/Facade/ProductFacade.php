<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Facade;

use App\Components\Product\Application\DTO\ProductFormable;
use App\Components\Product\Domain\DTO\ProductDTO;
use App\Components\Product\Infrastructure\Factory\ProductDTOApplicationFactory;
use App\Components\Product\Infrastructure\Repository\ProductRepository;

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
        $productDto = $this->productDTOFactory->createForFormation($productFormable);

        return $this->productRepository->create($productDto);
    }

    public function updateProduct(ProductFormable $productFormable, int $id): bool
    {
        $productDto = $this->productDTOFactory->createForFormation($productFormable);

        return $this->productRepository->update($productDto, $id);
    }

    public function deleteUser(int $id): bool
    {
        return $this->productRepository->delete($id);
    }

    public function getSingleProduct(int $id): ?ProductDTO
    {
        $product = $this->productRepository->getByUuidOrFail($id);

        if ($product === null) {
            return null;
        }

        return $this->productDTOFactory->createForFetched($product);
    }

}
