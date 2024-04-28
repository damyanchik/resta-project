<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\Exception;

use Exception;

class ProductAvailabilityException extends Exception implements ProductException
{
    public static function notFound(): static
    {
        return new static('Product not found.', 404);
    }

    public static function unavailable(): static
    {
        return new static('Product is unavailable.', 406);
    }
}
