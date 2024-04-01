<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Exception;

use Exception;

class OrderItemException extends Exception
{
    public static function notFound(string $message): static
    {
        return new static($message, 404);
    }
}
