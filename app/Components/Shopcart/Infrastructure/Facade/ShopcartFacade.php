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

    public function addOrUpdateByFormable(ShopcartFormable $shopcartFormable)
    {
        $this->shopcart->update($this->factory->createShopcartItemFormableDTO(
            quantity: $shopcartFormable->quantity(),
            productUuid: $shopcartFormable->productUuid(),
        ));
    }

    public function displayCart(): ?ShopcartDTO
    {
        return $this->shopcart->show();
    }

    public function removeByUuid(string $uuid)
    {
        $this->shopcart->remove($uuid);
    }

    //show kolejne i tyle

    //moze remove +
}
