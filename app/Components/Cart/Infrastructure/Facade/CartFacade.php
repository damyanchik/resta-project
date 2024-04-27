<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Facade;

use App\Components\Cart\Application\DTO\CartFormable;
use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Infrastructure\Factory\CartDTOFactory;
use App\Components\Cart\Infrastructure\Factory\CartItemDTOFactory;
use App\Components\Cart\Infrastructure\Http\Session\CartSession;
use App\Components\Cart\Infrastructure\Resolver\CartResolver;
use App\Components\Cart\Infrastructure\Service\CartService;

class CartFacade
{
    public function __construct(
        private readonly CartDTOFactory     $cartDTOFactory,
        private readonly CartItemDTOFactory $cartItemDTOFactory,
        private readonly CartResolver       $cartResolver,
        private readonly CartSession        $session,
        private readonly CartService        $cartService,
    )
    {
    }

    public function addItemToCart(string $uuid, CartFormable $cartFormable): bool
    {
        $cartItems = $this->cartResolver->resolveAssigningNewItemToCartItems(
            itemFormableDTO: $this->cartItemDTOFactory->createCartItemFormableDTO(
                productUuid: $uuid,
                quantity: $cartFormable->quantity(),
            ),
            cartItems: $this->session->getCart(),
        );

        return $this->session->addCartItems($this->cartService->getValidatedItems($cartItems));
    }

    public function getCartItems(): ?CartDTO
    {
        $this->reloadCartItems();
        $cart = $this->session->getCart();

        if (empty($cart->first())) {
            return null;
        }

        return $this->cartDTOFactory->createCartDTO($cart);
    }

    public function removeItemFromCart(string $uuid): bool
    {
        $this->reloadCartItems();

        return $this->session->removeCartItem($uuid);
    }

    public function destroyCart(): bool
    {
        return $this->session->destroyCart();
    }

    public function reloadCartItems(): bool
    {
        return $this->session->addCartItems($this->cartService->getValidatedItems($this->session->getCart()));
    }
}
