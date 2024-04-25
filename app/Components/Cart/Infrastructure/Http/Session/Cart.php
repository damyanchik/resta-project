<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Session;

use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Domain\Enum\CartAttributeEnum;
use App\Components\Cart\Infrastructure\Factory\CartDTOFactory;
use App\Components\Cart\Infrastructure\Service\CartService;
use Illuminate\Contracts\Session\Session;

class Cart
{
    private const SESSION_CART = 'cart';

    public function __construct(
        private readonly Session        $session,
        private readonly CartService    $cartService,
        private readonly CartDTOFactory $factory,
    )
    {
    }

    public function addItem(CartItemFormableDTO $cartDTO): bool
    {
        $cart = $this->session->get(self::SESSION_CART, []);

        $cart[$cartDTO->productUuid] = [CartAttributeEnum::QUANTITY->value => $cartDTO->quantity];

        return array_key_exists($cartDTO->productUuid, $this->reloadItems($cart));
    }

    public function removeItem(string $productUuid): bool
    {
        $this->session->forget($productUuid);
        $cart = $this->session->get(self::SESSION_CART, []);

        return ! empty($cart) && ! array_key_exists($productUuid, $this->reloadItems($cart));
    }

    public function showItems(): ?CartDTO
    {
        $cart = $this->session->get(self::SESSION_CART, []);

        return empty($cart)
            ? null
            : $this->factory->createCartDTO($this->reloadItems($cart));
    }

    public function removeItems(): bool
    {
        $this->session->forget(self::SESSION_CART);

        return empty($this->session->get(self::SESSION_CART, []));
    }

    private function reloadItems(array $cart): array
    {
        $cartItems = $this->cartService->getValidatedItems($cart);
        $this->session->put(self::SESSION_CART, $cartItems);

        return $cartItems;
    }
}
