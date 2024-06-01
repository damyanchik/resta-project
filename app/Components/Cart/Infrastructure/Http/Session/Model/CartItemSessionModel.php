<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Session\Model;

use App\Components\Cart\Domain\Enum\CartItemAttributeEnum;

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
            CartItemAttributeEnum::PRODUCT_UUID->value => $this->productUuid,
            CartItemAttributeEnum::QUANTITY->value => $this->quantity,
        ];
    }
}
