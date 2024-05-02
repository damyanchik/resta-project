<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Facade;

use App\Components\Cart\Application\DTO\CartFormable;
use App\Components\Cart\Application\Facade\CartFacade;
use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Domain\DTO\CartFormableDTO;
use App\Components\Cart\Domain\Exception\CartException;
use App\Components\Cart\Infrastructure\Factory\CartDTOFactory;
use App\Components\Cart\Infrastructure\Factory\Session\CartSessionFactory;
use App\Components\Cart\Infrastructure\Http\Session\CartSession;
use App\Components\Cart\Infrastructure\Service\CartService;

class CartApplicationFacade implements CartFacade
{
    public function __construct(
        private readonly CartDTOFactory     $cartDTOFactory,
        private readonly CartSession        $session,
        private readonly CartService        $cartService,
        private readonly CartSessionFactory $cartSessionFactory,
    )
    {
    }

    public function addItemToCart(string $uuid, CartFormable $cartFormable): bool
    {
        $cartFormableDTO = $this->session->getCart();

        return $this->session->addCartItems(
            cartSession: $this->cartSessionFactory->createCartSession(
                cartItemFormableDTOs: $this->cartService->getValidatedItems(
                    cartItemFormableDTOs: $this->cartService->joinItemToCartItemFormableDTOs(
                        uuid: $uuid,
                        cartFormable: $cartFormable,
                        cartItemFormableDTOs: $cartFormableDTO->cartFormableItemDTOs,
                    ),
                ),
                discount: $cartFormableDTO->discount,
            ),
        );
    }

    public function getCart(): CartDTO
    {
        $this->reloadCartItems();
        $cartFormableDTO = $this->session->getCart();

        if (empty($cartFormableDTO->cartFormableItemDTOs->first())) {
            $this->destroyCart();
            throw CartException::emptyCart();
        }

        return $this->cartDTOFactory->createCartDTO($cartFormableDTO);
    }

    /** @throws CartException */
    public function getFormableCart(): CartFormableDTO
    {
        $this->reloadCartItems();
        $cartFormableDTO = $this->session->getCart();

        return empty($cartFormableDTO->cartFormableItemDTOs->first())
            ? throw CartException::emptyCart()
            : $cartFormableDTO;
    }

    /** @throws CartException */
    public function removeItemFromCart(string $uuid): bool
    {
        $this->reloadCartItems();
        $cartFormableDTO = $this->session->getCart();

        if (empty($cart->cartFormableItems->first())) {
            $this->destroyCart();
            throw CartException::emptyCart();
        }

        return $this->session->addCartItems(
            cartSession: $this->cartSessionFactory->createCartSession(
                cartItemFormableDTOs: $this->cartService->removeItemFromCartItemFormableDTOs(
                    uuid: $uuid,
                    cartItemFormableDTOs: $cartFormableDTO->cartFormableItemDTOs,
                ),
                discount: $cartFormableDTO->discount,
            ),
        );
    }

    public function destroyCart(): bool
    {
        return $this->session->destroyCart();
    }

    public function reloadCartItems(): bool
    {
        $cartFormableDTO = $this->session->getCart();

        return $this->session->addCartItems(
            cartSession: $this->cartSessionFactory->createCartSession(
                cartItemFormableDTOs: $this->cartService->getValidatedItems($cartFormableDTO->cartFormableItemDTOs),
                discount: $cartFormableDTO->discount,
            ),
        );
    }
}
