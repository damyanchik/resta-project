<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Factory\ViewModel;

use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Domain\DTO\CartItemDTO;
use App\Components\Cart\Presentation\CartItemViewModel;
use App\Components\Cart\Presentation\CartViewModel;

class CartViewModelFactory
{
    public function createByShopcartDTO(?CartDTO $shopcartDTO): ?CartViewModel
    {
        if ($shopcartDTO === null) {
            return null;
        }

        return new CartViewModel(
            items: $shopcartDTO->items->map(fn ($item) => $this->createByShopcartItemDTO($item)->toArray()),
            positions: $shopcartDTO->countPositions(),
            subtotal: $shopcartDTO->sumSubtotal(),
            total: $shopcartDTO->sumTotal(),
        );
    }

    public function createByShopcartItemDTO(CartItemDTO $itemDTO): CartItemViewModel
    {
        return new CartItemViewModel(
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
