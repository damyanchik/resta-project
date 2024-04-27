<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Mapper;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Http\Session\Model\CartItemSessionModel;
use App\Components\Cart\Infrastructure\Http\Session\Model\CartSessionModel;
use Illuminate\Support\Collection;

class CartItemFormableDTOMapper
{
    /**
     * @param Collection<CartItemFormableDTO> $cartItemFormableDTOs
     * @return CartSessionModel
     */
    public function manyToCartSession(Collection $cartItemFormableDTOs): CartSessionModel
    {
        return new CartSessionModel(
            sessionCartItems: $cartItemFormableDTOs->map(fn($itemForm) => new CartItemSessionModel(
                productUuid: $itemForm->productUuid,
                quantity: $itemForm->quantity,
            ))
        );
    }
}