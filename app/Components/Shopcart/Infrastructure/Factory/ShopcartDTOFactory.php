<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Factory;

use App\Components\Product\Application\Factory\ProductDTOFactory;
use App\Components\Product\Application\Mapper\ProductModelMapper;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Domain\DTO\ProductDTO;
use App\Components\Shopcart\Domain\DTO\ShopcartDTO;
use App\Components\Shopcart\Domain\DTO\ShopcartItemDTO;
use App\Components\Shopcart\Domain\DTO\ShopcartItemFormableDTO;

class ShopcartDTOFactory
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly ProductModelMapper $productModelMapper,
    )
    {
    }

    public function createShopcartItemFormableDTO(
        int $quantity,
        string $productUuid,
    ): ShopcartItemFormableDTO
    {
        return new ShopcartItemFormableDTO(
            quantity: $quantity,
            productUuid: $productUuid,
        );
    }

    public function createShopcartDTO(array $shopcart): ShopcartDTO
    {
        $products = $this->productRepository->getByUuids(
            uuids: array_keys($shopcart),
            columns: ['uuid', ],
        );

        $shopcartItems = $this->productModelMapper->toShopcartItemPreviewDTOs($products);

        return new ShopcartDTO($shopcartItems);
    }
}
