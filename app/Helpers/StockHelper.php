<?php

declare(strict_types=1);

namespace App\Helpers;

class StockHelper
{
    public static function formatStock(int $stock, string $unit = 'pc'): string
    {
        if ($stock !== 1) {
            $unit = $unit . 's';
        }

        return $stock . ' ' . strtolower($unit);
    }
}
