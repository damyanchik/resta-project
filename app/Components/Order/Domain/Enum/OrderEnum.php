<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Enum;

enum OrderEnum: string
{
    case Ready = 'ready';
    case Cancelled = 'cancelled';
}
