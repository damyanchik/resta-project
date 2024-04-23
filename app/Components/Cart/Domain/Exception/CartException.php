<?php

declare(strict_types=1);

namespace App\Components\Cart\Domain\Exception;

use Exception;

class CartException extends Exception
{
    public static function notFound(string $message): static
    {
        return new static($message, 404);
    }

    public static function unavailable(): static
    {
        return new static('Product is unavailable.', 406);
    }

    public static function notEnoughOnStock(): static
    {
        return new static('Not enough product on stock.', 406);
    }
}
