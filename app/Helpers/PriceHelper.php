<?php

declare(strict_types=1);

namespace App\Helpers;

class PriceHelper
{
    public static function formatPrice(int $price, string $currency = null): string
    {
        if (!empty($currency)) {
            $currency = ' ' . strtoupper($currency);
        }

        return number_format($price / 100, 2, ',', ' ') . $currency;
    }

    public static function convertFloatToIntPrice(float $price): int
    {
        return (int)round($price * 100);
    }

    public static function convertIntToFloatPrice(int $price): float
    {
        return (float) number_format($price / 100, 2, '.','');
    }
}
