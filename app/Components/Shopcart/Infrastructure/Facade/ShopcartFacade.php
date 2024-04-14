<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Facade;

use App\Components\Shopcart\Application\DTO\ShopcartFormable;
use App\Components\Shopcart\Domain\DTO\ShopcartDTO;
use App\Components\Shopcart\Infrastructure\Factory\ShopcartDTOFactory;
use App\Components\Shopcart\Infrastructure\Http\Session\Shopcart;

class ShopcartFacade
{
    public function __construct(
        private readonly Shopcart $shopcart,
        private readonly ShopcartDTOFactory $factory,
    )
    {
    }

    public function addToCart(string $uuid, ShopcartFormable $shopcartFormable): bool
    {
        return $this->shopcart->add($this->factory->createShopcartItemFormableDTO(
            quantity: $shopcartFormable->quantity(),
            productUuid: $uuid,
        ));
    }

    public function displayAllCart(): ?ShopcartDTO
    {
        return $this->shopcart->show();
    }

    public function removeFromCart(string $uuid): void
    {
        $this->shopcart->remove($uuid);
    }
}
