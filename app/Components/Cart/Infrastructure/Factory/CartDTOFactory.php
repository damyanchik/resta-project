<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Factory;

use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Domain\DTO\CartFormableDTO;

class CartDTOFactory
{
    public function __construct(
        private readonly CartItemDTOFactory $cartItemDTOFactory,
    )
    {
    }

    /**
     * @param CartFormableDTO $cartFormableDTO
     * @return CartDTO
     */
    public function createCartDTO(CartFormableDTO $cartFormableDTO): CartDTO
    {
        return new CartDTO(
            items: $this->cartItemDTOFactory->createCartItemDTOs($cartFormableDTO->cartFormableItems),
            discount: $cartFormableDTO->discount,
        );
    }
}
