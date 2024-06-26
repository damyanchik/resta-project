<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Exception;

use Exception;

class OrderItemException extends Exception
{
    public static function notFound(): static
    {
        return new static('Order item not found.', 404);
    }
}
