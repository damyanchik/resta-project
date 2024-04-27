<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Factory;

use App\Components\Cart\Domain\DTO\CartItemDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Product\Application\Repository\ProductRepository;
use Illuminate\Support\Collection;

class CartItemDTOFactory
{
    public function __construct(
        private readonly ProductRepository $productRepository,
    )
    {
    }

    public function createCartItemFormableDTO(string $productUuid, int $quantity): CartItemFormableDTO
    {
        return new CartItemFormableDTO(
            productUuid: $productUuid,
            quantity: $quantity,
        );
    }

    /**
     * @param Collection<CartItemFormableDTO> $cartItems
     * @return Collection<CartItemDTO>
     */
    public function createCartItemDTOs(Collection $cartItems): Collection
    {
        $products = $this->productRepository->getByUuids(
            uuids: $cartItems->map(fn($item) => $item->productUuid)->toArray(),
            columns: ['uuid', 'name', 'price', 'is_vegetarian', 'is_spicy'],
        );

        return $products->mapWithKeys(
            fn($product) => [$product->uuid => new CartItemDTO(
                name: $product->name,
                quantity: $cartItems->firstWhere(fn($item) => $item->productUuid === $product->uuid)
                    ->quantity,
                nettPrice: $product->price,
                grossPrice: $product->price,
                isVegetarian: $product->is_vegetarian,
                isSpicy: $product->is_spicy,
            )]);
    }
}
