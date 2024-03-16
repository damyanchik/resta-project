<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Enum;

enum OrderTypeEnum: string
{
    case DELIVERY = 'delivery';
    case RESERVATION = 'reservation';
    case TO_GO = 'to_go';
    case ON_SITE = 'on_site';
}
