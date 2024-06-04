<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Service;

use App\Components\Cart\Application\DTO\CartFormable;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Factory\CartItemDTOFactory;
use App\Components\Cart\Infrastructure\Mapper\CartItemAvailableMapper;
use App\Components\Cart\Infrastructure\Mapper\CartItemFormableDTOMapper;
use App\Components\Cart\Infrastructure\Resolver\CartResolver;
use App\Components\Product\Application\Repository\ProductRepository;
use Illuminate\Support\Collection;

class CartService
{
    private const PRODUCT_AVAILABLE_COLUMNS = ['uuid', 'stock', 'is_available', 'is_unlimited'];

    public function __construct(
        private readonly CartItemDTOFactory        $cartItemDTOFactory,
        private readonly CartItemFormableDTOMapper $itemFormableDTOMapper,
        private readonly CartResolver              $cartResolver,
        private readonly ProductRepository         $productRepository,
        private readonly CartItemAvailableMapper   $availableMapper,
    )
    {
    }

    /**
     * @param string $uuid
     * @param CartFormable $cartFormable
     * @param Collection<int, CartItemFormableDTO> $cartItemFormableDTOs
     * @return Collection<int, CartItemFormableDTO>
     */
    public function joinItemToCartItemFormableDTOs(
        string       $uuid,
        CartFormable $cartFormable,
        Collection   $cartItemFormableDTOs,
    ): Collection
    {
        return $this->cartResolver->resolveAssigningNewItemToCartItems(
            cartItemFormableDTO: $this->cartItemDTOFactory->createCartItemFormableDTO(
                productUuid: $uuid,
                quantity: $cartFormable->quantity(),
            ),
            cartItemFormableDTOs: $cartItemFormableDTOs,
        );
    }

    /**
     * @param string $uuid
     * @param Collection<CartItemFormableDTO> $cartItemFormableDTOs
     * @return Collection<CartItemFormableDTO>
     */
    public function removeItemFromCartItemFormableDTOs(
        string     $uuid,
        Collection $cartItemFormableDTOs,
    ): Collection
    {
        return $cartItemFormableDTOs->filter(fn($itemFormDTO) => $itemFormDTO->productUuid !== $uuid);
    }

    /**
     * @param Collection<CartItemFormableDTO> $cartItemFormableDTOs
     * @return Collection<CartItemFormableDTO>
     */
    public function getValidatedItems(Collection $cartItemFormableDTOs): Collection
    {
        $products = $this->productRepository->getByUuids(
            uuids: $cartItemFormableDTOs->map(fn($item) => $item->productUuid)->toArray(),
            columns: self::PRODUCT_AVAILABLE_COLUMNS,
        );
        return $this->itemFormableDTOMapper->toCartSessionItems(
            cartItemFormableDTOs: $this->cartResolver->resolveItemsBetweenRepositoryAndSession(
                cartItemFormableDTOs: $cartItemFormableDTOs,
                cartItemAvailableDTOs: $products->mapWithKeys(
                    fn($product) => [$product->getKey() => $this->availableMapper->fromProductModel($product)],
                ),
            ),
        );
    }
}
