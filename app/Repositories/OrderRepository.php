<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Traits\IndexHandling;

class OrderRepository extends AbstractRepository implements OrderRepositoryInterface
{
    use IndexHandling;

    public function __construct(protected Order $model)
    {
    }
}
