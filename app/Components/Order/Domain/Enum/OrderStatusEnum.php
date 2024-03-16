<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Enum;

enum OrderStatusEnum: string
{
    case RECEIVED = 'received';
    case PREPARING = 'preparing';
    case READY = 'ready';
    case CLOSED = 'closed';
    case CANCELLED = 'cancelled';
}
