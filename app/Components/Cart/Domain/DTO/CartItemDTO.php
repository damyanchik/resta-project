<?php

declare(strict_types=1);

namespace App\Components\Cart\Domain\DTO;

use Akaunting\Money\Money;
use App\Components\Common\DTO\PriceDTO;

class CartItemDTO
{
    public function __construct(
        public readonly string $name,
        public readonly int $quantity,
        public readonly PriceDTO $price,
        public readonly bool $isVegetarian,
        public readonly bool $isSpicy,
    )
    {
    }

    public function sumNettPrice(): Money
    {
        return $this->price->nett->multiply($this->quantity);
    }

    public function sumGrossPrice(): Money
    {
        return $this->price->gross->multiply($this->quantity);
    }
}
