<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Service;

use App\Components\Product\Application\Factory\ProductDTOFactory;
use App\Components\Shopcart\Infrastructure\Mapper\ShopcartItemsMapper;
use App\Components\Shopcart\Infrastructure\Resolver\ShopcartItemResolver;

class ShopcartService
{
    public function __construct(
        private readonly ProductDTOFactory $productDTOFactory,
        private readonly ShopcartItemsMapper $shopcartItemsMapper,
        private readonly ShopcartItemResolver $shopcartItemResolver,
    )
    {
    }

    public function getValidatedItems(array $shopcartItems): array
    {
        $productDTOs = $this->productDTOFactory->toProductShortDTOs(array_keys($shopcartItems));
        $shopcartDTOs = $this->shopcartItemsMapper->toShopcartFormableDTOs($shopcartItems);

        $resolvedShopcart = $this->shopcartItemResolver->betweenRepositoryAndSession($shopcartDTOs, $productDTOs);

        return $this->shopcartItemsMapper->fromShopcartFormableDTOs($resolvedShopcart);
    }
}
