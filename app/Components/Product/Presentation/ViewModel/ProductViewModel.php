<?php

declare(strict_types=1);

namespace App\Components\Product\Presentation\ViewModel;

use Akaunting\Money\Money;

class ProductViewModel
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly int    $stock,
        public readonly Money  $price,
        public readonly bool   $isUnlimited,
        public readonly bool   $isVegetarian,
        public readonly bool   $isSpicy,
        public readonly bool   $isAvailable,
        public readonly string $categoryUuid,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'stock' => $this->stock,
            'price' => $this->price->format(),
            'is_unlimited' => $this->isUnlimited,
            'is_vegetarian' => $this->isVegetarian,
            'is_spicy' => $this->isSpicy,
            'is_available' => $this->isAvailable,
            'category_uuid' => $this->categoryUuid,
        ];
    }
}
