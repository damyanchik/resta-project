<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Mapper;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Http\Session\Model\CartItemSessionModel;
use Illuminate\Support\Collection;

class CartItemFormableDTOMapper
{
    /**
     * @param Collection<CartItemFormableDTO> $cartItemFormableDTOs
     * @return Collection<CartItemSessionModel>
     */
    public function toCartSessionItems(Collection $cartItemFormableDTOs): Collection
    {
        return $cartItemFormableDTOs->map(fn($itemForm) => new CartItemSessionModel(
                productUuid: $itemForm->productUuid,
                quantity: $itemForm->quantity,
        ));
    }
}
