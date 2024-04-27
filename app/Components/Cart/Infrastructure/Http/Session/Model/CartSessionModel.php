<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Session\Model;

use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Domain\Enum\CartAttributeEnum;
use Illuminate\Support\Collection;

class CartSessionModel
{

    /**
     * @param Collection<CartItemSessionModel> $sessionCartItems
     */
    public function __construct(
        public readonly Collection $sessionCartItems,
    )
    {
    }

    public function toArray()
    {
        return [
            'items' => $this->sessionCartItems->toArray(),
        ];
    }

    //dodaje i laczy,
    //

    public function addItem(CartItemFormableDTO $cartDTO): bool
    {
        $cart = $this->session->getCart();

        $cart[$cartDTO->productUuid] = [CartAttributeEnum::QUANTITY->value => $cartDTO->quantity];

        return array_key_exists($cartDTO->productUuid, $this->reloadItems($cart));
    }

    public function removeItem(string $productUuid): bool
    {
        return $this->session->removeItem($productUuid);
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
        return $this->session->destroyCart();
    }

    private function reloadItems(array $cart): array
    {
        $cartItems = $this->cartService->getValidatedItems($cart);
        $this->session->addItem($cartItems);

        return $cartItems;
    }
}
