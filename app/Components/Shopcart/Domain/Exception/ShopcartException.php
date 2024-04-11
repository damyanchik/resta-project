<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Domain\Exception;

use Exception;

class ShopcartException extends Exception
{
    public static function notFound(string $message): static
    {
        return new static($message, 404);
    }

    public static function unavailable(): static
    {
        return new static('Product is unavailable.', 404);
    }

    public static function notEnoughOnStock(): static
    {
        return new static('Not enough product on stock.', 404);
    }
}