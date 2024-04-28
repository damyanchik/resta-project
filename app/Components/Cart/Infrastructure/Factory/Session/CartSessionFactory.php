<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Factory\Session;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Http\Session\Model\CartSessionModel;
use App\Components\Cart\Infrastructure\Mapper\CartItemFormableDTOMapper;
use Illuminate\Support\Collection;

class CartSessionFactory
{
    public function __construct(
        private readonly CartItemFormableDTOMapper $cartItemFormableDTOMapper,
    )
    {
    }

    /**
     * @param Collection<CartItemFormableDTO> $cartItemFormableDTOs
     * @param object|null $discount
     * @return CartSessionModel
     */
    public function createCartSession(Collection $cartItemFormableDTOs, ?object $discount): CartSessionModel
    {
        return new CartSessionModel(
            sessionCartItems: $this->cartItemFormableDTOMapper->toCartSessionItems($cartItemFormableDTOs),
            discount: $discount,
        );
    }
}
