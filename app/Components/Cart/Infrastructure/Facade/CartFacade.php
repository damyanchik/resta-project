<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Facade;

use App\Components\Cart\Application\DTO\CartFormable;
use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Infrastructure\Factory\CartDTOFactory;
use App\Components\Cart\Infrastructure\Http\Session\Cart;

class CartFacade
{
    public function __construct(
        private readonly Cart           $cart,
        private readonly CartDTOFactory $factory,
    )
    {
    }

    public function addToCart(string $uuid, CartFormable $cartFormable): bool
    {
        return $this->cart->add($this->factory->createCartItemFormableDTO(
            quantity: $cartFormable->quantity(),
            productUuid: $uuid,
        ));
    }

    public function displayCartItems(): ?CartDTO
    {
        return $this->cart->show();
    }

    public function removeFromCart(string $uuid): void
    {
        $this->cart->remove($uuid);
    }
}
