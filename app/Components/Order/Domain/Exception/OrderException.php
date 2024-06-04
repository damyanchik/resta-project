<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Exception;

use Exception;

class OrderException extends Exception
{
    public static function notFound(): static
    {
        return new static('Order not found.', 404);
    }
}
