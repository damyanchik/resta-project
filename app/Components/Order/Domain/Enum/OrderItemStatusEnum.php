<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Enum;

enum OrderItemStatusEnum: string
{
    case PREPARING = 'preparing';
    case READY = 'ready';
    case CANCELLED = 'cancelled';
}
