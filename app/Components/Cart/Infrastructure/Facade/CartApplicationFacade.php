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

        $this->session->addCartItems(
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

        return $this->session->findCartItem($uuid);
    }

    /** @throws CartException */
    public function getCart(): CartDTO
    {
        $this->reloadCartItems();
        $cartFormableDTO = $this->session->getCart();

        if ($cartFormableDTO->cartFormableItemDTOs->first() === null) {
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

        return $cartFormableDTO->cartFormableItemDTOs->first() === null
            ? throw CartException::emptyCart()
            : $cartFormableDTO;
    }

    /** @throws CartException */
    public function removeItemFromCart(string $uuid): bool
    {
        $this->reloadCartItems();
        $cartFormableDTO = $this->session->getCart();

        if ($cartFormableDTO->cartFormableItemDTOs->first() === null) {
            $this->destroyCart();
            throw CartException::emptyCart();
        }

        $this->session->addCartItems(
            cartSession: $this->cartSessionFactory->createCartSession(
                cartItemFormableDTOs: $this->cartService->removeItemFromCartItemFormableDTOs(
                    uuid: $uuid,
                    cartItemFormableDTOs: $cartFormableDTO->cartFormableItemDTOs,
                ),
                discount: $cartFormableDTO->discount,
            ),
        );

        return $this->session->findCartItem($uuid);
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
