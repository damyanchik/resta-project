<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Factory;

use App\Components\Product\Application\Mapper\ProductModelMapper;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;

class CartDTOFactory
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly ProductModelMapper $productModelMapper,
    )
    {
    }

    public function createCartItemFormableDTO(
        int $quantity,
        string $productUuid,
    ): CartItemFormableDTO
    {
        return new CartItemFormableDTO(
            quantity: $quantity,
            productUuid: $productUuid,
        );
    }

    public function createCartDTO(array $cart): CartDTO
    {
        $products = $this->productRepository->getByUuids(
            uuids: array_keys($cart),
            columns: ['uuid', 'name', 'price', 'is_vegetarian', 'is_spicy'],
        );

        return new CartDTO($this->productModelMapper->toCartItemDTOs($products, $cart));
    }
}
