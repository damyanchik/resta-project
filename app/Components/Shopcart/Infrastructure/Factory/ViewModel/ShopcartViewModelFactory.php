<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Factory\ViewModel;

use App\Components\Shopcart\Domain\DTO\ShopcartDTO;
use App\Components\Shopcart\Domain\DTO\ShopcartItemDTO;
use App\Components\Shopcart\Presentation\ShopcartItemViewModel;
use App\Components\Shopcart\Presentation\ShopcartViewModel;

class ShopcartViewModelFactory
{
    public function createByShopcartDTO(?ShopcartDTO $shopcartDTO): ?ShopcartViewModel
    {
        if ($shopcartDTO === null) {
            return null;
        }

        return new ShopcartViewModel(
            items: $shopcartDTO->items->map(fn ($item) => $this->createByShopcartItemDTO($item)->toArray()),
            positions: $shopcartDTO->countPositions(),
            subtotal: $shopcartDTO->sumSubtotal(),
            total: $shopcartDTO->sumTotal(),
        );
    }

    public function createByShopcartItemDTO(ShopcartItemDTO $itemDTO): ShopcartItemViewModel
    {
        return new ShopcartItemViewModel(
            name: $itemDTO->name,
            quantity: $itemDTO->quantity,
            nettPrice: $itemDTO->nettPrice,
            grossPrice: $itemDTO->grossPrice,
            isVegetarian: $itemDTO->isVegetarian,
            isSpicy: $itemDTO->isSpicy,
            sumNettPrice: $itemDTO->sumNettPrice(),
            sumGrossPrice: $itemDTO->sumGrossPrice(),
        );
    }
}
