<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\DTO;

use Akaunting\Money\Money;
use App\Components\Common\EloquentRepository\EloquentDataBag;

class ProductFormableDTO implements EloquentDataBag
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly int $stock,
        public readonly Money $price,
        public readonly int $rate,
        public readonly bool $isUnlimited,
        public readonly bool $isVegetarian,
        public readonly bool $isSpicy,
        public readonly bool $isAvailable,
        public readonly string $categoryUuid,
        public readonly int $orderNr,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'stock' => $this->stock,
            'price' => $this->price->getAmount(),
            'rate' => $this->rate,
            'is_unlimited' => $this->isUnlimited,
            'is_vegetarian' => $this->isVegetarian,
            'is_spicy' => $this->isSpicy,
            'is_available' => $this->isAvailable,
            'category_id' => $this->categoryUuid,
            'order_nr' => $this->orderNr,
        ];
    }
}
