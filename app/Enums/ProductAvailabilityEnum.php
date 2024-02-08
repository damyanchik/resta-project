<?php

declare(strict_types=1);

namespace App\Enums;

enum ProductAvailabilityEnum: int
{
    case UNAVAILABLE = 0;
    case AVAILABLE = 1;

    public function name(): string
    {
        return match($this)
        {
            self::UNAVAILABLE => 'Unavailable',
            self::AVAILABLE => 'Available',
        };
    }
}
