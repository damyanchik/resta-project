<?php

declare(strict_types=1);

namespace App\Helpers;

class StockHelper
{
    public static function formatStock(int $stock, string $unit = 'pcs'): string
    {
        return $stock . ' ' . strtolower($unit);
    }
}
