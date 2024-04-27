<?php

declare(strict_types=1);

namespace App\Components\Cart\Domain\DTO;

class CartItemFormableDTO
{
    public function __construct(
        public readonly string $productUuid,
        public readonly int $quantity,
    )
    {
    }
}
