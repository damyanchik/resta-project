<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Factory;

use App\Components\Cart\Domain\DTO\CartItemDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Common\DTO\PriceDTO;
use App\Components\Finance\Application\Calculator\PriceCalculator;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Domain\Model\Product;
use Illuminate\Support\Collection;

class CartItemDTOFactory
{
    private const PRODUCT_INFO_COLUMNS = ['uuid', 'name', 'price', 'rate', 'is_vegetarian', 'is_spicy'];

    public function __construct(
        private readonly PriceCalculator   $priceCalculator,
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
     * @param Collection<CartItemFormableDTO> $cartItemFormableDTOs
     * @return Collection<CartItemDTO>
     */
    public function createCartItemDTOs(Collection $cartItemFormableDTOs): Collection
    {
        $products = $this->productRepository->getByUuids(
            uuids: $cartItemFormableDTOs->map(fn($item) => $item->productUuid)->toArray(),
            columns: self::PRODUCT_INFO_COLUMNS,
        );

        return $products->mapWithKeys(
            fn(Product $product) => [
                $product->uuid => new CartItemDTO(
                    name: $product->name,
                    quantity: $cartItemFormableDTOs->firstWhere(
                        fn(CartItemFormableDTO $item) => $item->productUuid === $product->uuid
                    )->quantity,
                    price: new PriceDTO(
                        nett: $this->priceCalculator->calculateNettFromGross($product->price, $product->rate),
                        gross: $product->price,
                        rate: $product->rate,
                    ),
                    isVegetarian: $product->is_vegetarian,
                    isSpicy: $product->is_spicy,
                ),
            ],
        );
    }
}
