<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Factory\ViewModel;

use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Domain\DTO\CartItemDTO;
use App\Components\Cart\Presentation\CartItemViewModel;
use App\Components\Cart\Presentation\CartViewModel;

class CartViewModelFactory
{
    public function createByCartDTO(?CartDTO $cartDTO): ?CartViewModel
    {
        if ($cartDTO === null) {
            return null;
        }

        return new CartViewModel(
            items: $cartDTO->items->map(fn ($item) => $this->createByCartItemDTO($item)->toArray()),
            positions: $cartDTO->countPositions(),
            subtotal: $cartDTO->sumSubtotal(),
            total: $cartDTO->sumTotal(),
        );
    }

    public function createByCartItemDTO(CartItemDTO $itemDTO): CartItemViewModel
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
