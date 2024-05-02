<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory;

use App\Components\Order\Infrastructure\Resolver\OrderResolver;

class OrderDTOFactory
{
    public function __construct(private readonly OrderResolver $orderResolver)
    {
    }

}
