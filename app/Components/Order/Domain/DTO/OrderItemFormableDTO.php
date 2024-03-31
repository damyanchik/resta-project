<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use App\Components\Common\EloquentRepository\EloquentDataBag;

class OrderItemFormableDTO implements EloquentDataBag
{
    public function toArray(): array
    {
        return [];
    }
}
