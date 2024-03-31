<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Repository;

use App\Components\Common\EloquentRepository\AbstractRepository;
use App\Components\Order\Domain\Model\Order;

class OrderRepository extends AbstractRepository
{
    public function __construct(protected readonly Order $model)
    {
    }
}
