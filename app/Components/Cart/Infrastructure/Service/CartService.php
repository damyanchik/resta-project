<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Service;

use App\Components\Cart\Application\DTO\CartFormable;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Factory\CartItemDTOFactory;
use App\Components\Cart\Infrastructure\Mapper\CartItemFormableDTOMapper;
use App\Components\Cart\Infrastructure\Resolver\CartResolver;
use App\Components\Product\Application\Repository\ProductRepository;
use Illuminate\Support\Collection;

class CartService
{
    public function __construct(
        private readonly CartItemDTOFactory        $cartItemDTOFactory,
        private readonly CartItemFormableDTOMapper $itemFormableDTOMapper,
        private readonly CartResolver              $cartResolver,
        private readonly ProductRepository         $productRepository,
    )
    {
    }

    /**
     * @param string $uuid
     * @param CartFormable $cartFormable
     * @param Collection<CartItemFormableDTO> $cartItemFormableDTOs
     * @return Collection<CartItemFormableDTO>
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
        return $this->itemFormableDTOMapper->toCartSessionItems(
            cartItemFormableDTOs: $this->cartResolver->resolveItemsBetweenRepositoryAndSession(
                cartItemFormableDTOs: $cartItemFormableDTOs,
                productAvailableDTOs: $this->productRepository->getProductAvailabilityDTOs(
                    uuids: $cartItemFormableDTOs->map(fn($item) => $item->productUuid)->toArray(),
                ),
            ),
        );
    }
}
