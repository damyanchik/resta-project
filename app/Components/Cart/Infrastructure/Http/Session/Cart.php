<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Session;

use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Factory\CartDTOFactory;
use App\Components\Cart\Infrastructure\Service\CartService;
use Illuminate\Contracts\Session\Session;

class Cart
{
    public function __construct(
        private readonly Session        $session,
        private readonly CartService    $cartService,
        private readonly CartDTOFactory $factory,
    )
    {
    }

    public function add(CartItemFormableDTO $cartDTO): bool
    {
        $cart = $this->session->get('cart', []);

        $cart[$cartDTO->productUuid] = ['quantity' => $cartDTO->quantity];

        $cartItems = $this->cartService->getValidatedItems($cart);

        $this->session->put('cart', $cartItems);

        return array_key_exists($cartDTO->productUuid, $cartItems);
    }

    public function show(): ?CartDTO
    {
        $cart = $this->session->get('cart', []);

        if (empty($cart)) {
            return null;
        }

        $cartItems = $this->cartService->getValidatedItems($cart);
        $this->session->put('cart', $cartItems);

        return $this->factory->createCartDTO($cartItems);
    }

    public function remove(string $productUuid): void
    {
        $cart = $this->session->get('cart', []);

        if (empty($cart)) {
            return;
        }

        unset($cart[$productUuid]);
        $this->session->put('cart', $cart);
    }
}
