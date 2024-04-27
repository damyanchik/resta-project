<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Mapper\Session;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Domain\Enum\CartAttributeEnum;
use Illuminate\Support\Collection;

class CartSessionMapper
{
    /**
     * @param Collection<array> $cartItems
     * @return Collection
     */
    public function toCartItemFormableDTOs(Collection $cartItems): Collection
    {
        return $cartItems->map(fn($item) => new CartItemFormableDTO(
            productUuid: $item[CartAttributeEnum::PRODUCT_UUID->value],
            quantity: $item[CartAttributeEnum::QUANTITY->value],
        ));
    }
}
