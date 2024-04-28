<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Mapper\Session;

use App\Components\Cart\Domain\DTO\CartFormableDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Domain\Enum\CartItemAttributeEnum;
use Illuminate\Support\Collection;

class CartSessionMapper
{
    /**
     * @param Collection<array> $cartItems
     * @param array|null $discount
     * @return CartFormableDTO
     */
    public function toCartItemFormableDTOs(Collection $cartItems, ?array $discount = null): CartFormableDTO
    {
        return new CartFormableDTO(
            cartFormableItems: $cartItems->map(fn($item) => new CartItemFormableDTO(
                productUuid: $item[CartItemAttributeEnum::PRODUCT_UUID->value],
                quantity: $item[CartItemAttributeEnum::QUANTITY->value],
            )),
            discount: null, //obj
        );
    }
}
