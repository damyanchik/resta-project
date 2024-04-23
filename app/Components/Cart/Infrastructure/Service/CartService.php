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
        private readonly CartItemsMapper   $cartItemsMapper,
        private readonly CartItemResolver  $cartItemResolver,
    )
    {
    }

    public function getValidatedItems(array $cartItems): array
    {
        $productDTOs = $this->productDTOFactory->createProductShortDTOs(array_keys($cartItems));
        $cartDTOs = $this->cartItemsMapper->toFormableDTOs($cartItems);

        $resolvedCart = $this->cartItemResolver->betweenRepositoryAndSession($cartDTOs, $productDTOs);

        return $this->cartItemsMapper->fromCartFormableDTOs($resolvedCart);
    }
}
