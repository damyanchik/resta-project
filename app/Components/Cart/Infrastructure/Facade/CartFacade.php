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
        private readonly Cart           $shopcart,
        private readonly CartDTOFactory $factory,
    )
    {
    }

    public function addToCart(string $uuid, CartFormable $shopcartFormable): bool
    {
        return $this->shopcart->add($this->factory->createShopcartItemFormableDTO(
            quantity: $shopcartFormable->quantity(),
            productUuid: $uuid,
        ));
    }

    public function displayCartItems(): ?CartDTO
    {
        return $this->shopcart->show();
    }

    public function removeFromCart(string $uuid): void
    {
        $this->shopcart->remove($uuid);
    }
}
