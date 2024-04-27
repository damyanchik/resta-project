<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Session\Model;

class CartItemSessionModel
{
    public function __construct(
        public readonly string $productUuid,
        public readonly int $quantity,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'product_uuid' => $this->productUuid,
            'quantity' => $this->quantity,
        ];
    }
}
