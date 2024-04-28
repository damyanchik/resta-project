<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\Exception;

use Exception;

class ProductStockException extends Exception implements ProductException
{
    public static function notEnoughOnStock(): static
    {
        return new static('Not enough product on stock.', 406);
    }
}
