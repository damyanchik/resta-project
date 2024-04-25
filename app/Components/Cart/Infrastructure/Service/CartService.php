<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Service;

use App\Components\Cart\Infrastructure\Mapper\CartItemsMapper;
use App\Components\Cart\Infrastructure\Resolver\CartItemResolver;

class CartService
{
    public function __construct(
        private readonly CartItemsMapper   $cartItemsMapper,
        private readonly CartItemResolver  $cartItemResolver,
    )
    {
    }

    public function getValidatedItems(array $cartItems): array
    {

        //factory / mapper ?
        $resolvedCart = $this->cartItemResolver->betweenRepositoryAndSession(
            $this->cartItemsMapper->toFormableDTOs($cartItems),
            $this->cartItemsMapper->toCartProductReloadDTOs(array_keys($cartItems)),
        );

        return $this->cartItemsMapper->fromCartFormableDTOs($resolvedCart);
    }
}
