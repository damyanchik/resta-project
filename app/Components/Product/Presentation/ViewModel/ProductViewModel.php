<?php

declare(strict_types=1);

namespace App\Components\Product\Presentation\ViewModel;

class ProductViewModel
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly int $stock,
        public readonly int $price,
        public readonly int $isUnlimited,
        public readonly int $isVegetarian,
        public readonly int $isSpicy,
        public readonly int $isAvailable,
        public readonly int $categoryId,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'stock' => $this->stock,
            'price' => $this->price,
            'is_unlimited' => $this->isUnlimited,
            'is_vegetarian' => $this->isVegetarian,
            'is_spicy' => $this->isSpicy,
            'is_available' => $this->isAvailable,
            'category_id' => $this->categoryId,
        ];
    }
}
