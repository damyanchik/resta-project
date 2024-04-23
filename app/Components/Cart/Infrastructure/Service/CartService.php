<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Service;

use App\Components\Product\Application\Factory\ProductDTOFactory;
use App\Components\Cart\Infrastructure\Mapper\CartItemsMapper;
use App\Components\Cart\Infrastructure\Resolver\CartItemResolver;

class CartService
{
    public function __construct(
        private readonly ProductDTOFactory $productDTOFactory,
        private readonly CartItemsMapper   $shopcartItemsMapper,
        private readonly CartItemResolver  $shopcartItemResolver,
    )
    {
    }

    public function getValidatedItems(array $shopcartItems): array
    {
        $productDTOs = $this->productDTOFactory->createProductShortDTOs(array_keys($shopcartItems));
        $shopcartDTOs = $this->shopcartItemsMapper->toFormableDTOs($shopcartItems);

        $resolvedShopcart = $this->shopcartItemResolver->betweenRepositoryAndSession($shopcartDTOs, $productDTOs);

        return $this->shopcartItemsMapper->fromShopcartFormableDTOs($resolvedShopcart);
    }
}
