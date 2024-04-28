<?php

declare(strict_types=1);

namespace App\Components\Cart\Domain\Exception;

use Exception;

class CartException extends Exception
{
    public static function emptyCart(): static
    {
        return new static('Cart is empty.', 404);
    }
}
