<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Factory;

use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use Illuminate\Support\Collection;

class CartDTOFactory
{
    public function __construct(
        private readonly CartItemDTOFactory $cartItemDTOFactory,
    )
    {
    }

    /**
     * @param Collection<CartItemFormableDTO> $cartItems
     * @return CartDTO
     */
    public function createCartDTO(Collection $cartItems): CartDTO
    {
        return new CartDTO($this->cartItemDTOFactory->createCartItemDTOs($cartItems));
    }
}
