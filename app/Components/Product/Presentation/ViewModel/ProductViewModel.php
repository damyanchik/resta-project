<?php

declare(strict_types=1);

namespace App\Components\Product\Presentation\ViewModel;

use App\Components\Common\DTO\PriceDTO;

class ProductViewModel
{
    public function __construct(
        public readonly string   $name,
        public readonly string   $description,
        public readonly int      $stock,
        public readonly PriceDTO $price,
        public readonly bool     $isUnlimited,
        public readonly bool     $isVegetarian,
        public readonly bool     $isSpicy,
        public readonly bool     $isAvailable,
        public readonly ?string   $categoryUuid,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'stock' => $this->stock,
            'price' => [
                'gross' => $this->price->gross->format(),
                'nett' => $this->price->nett->format(),
                'rate' => $this->price->rate,
            ],
            'is_unlimited' => $this->isUnlimited,
            'is_vegetarian' => $this->isVegetarian,
            'is_spicy' => $this->isSpicy,
            'is_available' => $this->isAvailable,
            'category_uuid' => $this->categoryUuid,
        ];
    }
}
