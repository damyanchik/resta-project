<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Session;

use App\Components\Cart\Domain\DTO\CartFormableDTO;
use App\Components\Cart\Domain\Enum\CartItemAttributeEnum;
use App\Components\Cart\Infrastructure\Http\Session\Model\CartSessionModel;
use App\Components\Cart\Infrastructure\Mapper\Session\CartSessionMapper;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Collection;

class CartSession
{
    private const SESSION_CART = 'cart';
    private const SESSION_ITEMS = 'orderEntryItemDTOs';
    private const SESSION_DISCOUNT = 'discount';

    public function __construct(
        private readonly CartSessionMapper $cartSessionMapper,
        private readonly Session           $session,
    )
    {
    }

    public function getCart(): CartFormableDTO
    {
        $cartItems = $this->session->get(self::SESSION_CART, []);

        return empty($cartItems[self::SESSION_ITEMS])
            ? new CartFormableDTO(new Collection())
            : $this->cartSessionMapper->toCartItemFormableDTOs(
                cartItems: new Collection($cartItems[self::SESSION_ITEMS]),
                discount: $cartItems[self::SESSION_DISCOUNT] ?? null,
            );
    }

    public function destroyCart(): bool
    {
        $this->session->forget(self::SESSION_CART);

        return empty($this->session->get(self::SESSION_CART, []));
    }

    public function addCartItems(CartSessionModel $cartSession): bool
    {
        $this->session->put(self::SESSION_CART, $cartSession->toArray());

        return ! empty($cartSession->sessionCartItems->toArray());
    }
}
