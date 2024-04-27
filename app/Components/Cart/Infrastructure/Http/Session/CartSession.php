<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Session;

use App\Components\Cart\Infrastructure\Http\Session\Model\CartSessionModel;
use App\Components\Cart\Infrastructure\Mapper\Session\CartSessionMapper;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Collection;

class CartSession
{
    private const SESSION_CART = 'cart';

    public function __construct(
        private readonly CartSessionMapper $cartSessionMapper,
        private readonly Session $session
    )
    {
    }

    public function getCart(): Collection
    {
        return $this->cartSessionMapper->toCartItemFormableDTOs(
            cartItems: new Collection($this->session->get(self::SESSION_CART, []))
        );
    }

    public function destroyCart(): bool
    {
        $this->session->forget(self::SESSION_CART);

        return empty($this->session->get(self::SESSION_CART, []));
    }

    public function addCartItems(CartSessionModel $cart): bool
    {
        $this->session->put(self::SESSION_CART, $cart->toArray());

        return ! empty($cart->toArray());
    }

    public function removeCartItem(string $productUuid): bool
    {
        $itemKey = $this->findItemKeyByProductUuid($productUuid);
        $this->session->forget($itemKey);

        return ! array_key_exists($itemKey, $this->session->get(self::SESSION_CART, []));
    }

    private function findItemKeyByProductUuid($productUuid)
    {
        return $this->getCart()->search(fn($item) => $item->productUuid === $productUuid);
    }
}
