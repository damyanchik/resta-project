<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Facade;

use App\Components\Shopcart\Application\DTO\ShopcartFormable;
use App\Components\Shopcart\Infrastructure\Factory\ShopcartDTOFactory;

class ShopcartFacade
{
    public function __construct(
        private readonly ShopcartDTOFactory $factory,
    )
    {
    }

    public function createByFormable(ShopcartFormable $shopcartFormable)
    {
        $this->factory->createShopcartDTO(
            quantity: $shopcartFormable->quantity(),
            productUuid: $shopcartFormable->productUuid(),
        );
    }
}
