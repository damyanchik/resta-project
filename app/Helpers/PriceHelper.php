<?php

declare(strict_types=1);

namespace App\Helpers;

class PriceHelper
{
    public static function formatPrice(int $price, string $currency): string
    {
        return number_format($price / 100, 2) . ' ' . strtoupper($currency);
    }
}
