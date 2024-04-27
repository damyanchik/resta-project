<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Service;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Http\Session\Model\CartSessionModel;
use App\Components\Cart\Infrastructure\Mapper\CartItemFormableDTOMapper;
use App\Components\Cart\Infrastructure\Resolver\CartResolver;
use App\Components\Product\Application\Repository\ProductRepository;
use Illuminate\Support\Collection;

class CartService
{
    public function __construct(
        private readonly CartResolver              $cartItemResolver,
        private readonly CartItemFormableDTOMapper $cartItemFormableDTOMapper,
        private readonly ProductRepository         $productRepository,
    )
    {
    }

    /**
     * @param Collection<CartItemFormableDTO> $cartItems
     * @return CartSessionModel
     */
    public function getValidatedItems(Collection $cartItems): CartSessionModel
    {
        $resolvedCart = $this->cartItemResolver->resolveBetweenRepositoryAndSession(
            $cartItems,
            $this->productRepository->getProductAvailabilityDTOs(
                uuids: $cartItems->map(fn($item) => $item->productUuid)->toArray(),
            ),
        );

        return $this->cartItemFormableDTOMapper->manyToCartSession($resolvedCart);
    }
}
