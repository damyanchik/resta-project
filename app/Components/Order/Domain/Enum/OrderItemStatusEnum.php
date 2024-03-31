<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Enum;

use App\Components\Common\Enum\BasicEnumTrait;

enum OrderItemStatusEnum: string
{
    use BasicEnumTrait;

    case PREPARING = 'preparing';
    case READY = 'ready';
    case CANCELLED = 'cancelled';
}
