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
        private readonly CartService    $shopcartService,
        private readonly CartDTOFactory $factory,
    )
    {
    }

    public function add(CartItemFormableDTO $shopcartDTO): bool
    {
        $shopcart = $this->session->get('shopcart', []);

        $shopcart[$shopcartDTO->productUuid] = ['quantity' => $shopcartDTO->quantity];

        $shopcartItems = $this->shopcartService->getValidatedItems($shopcart);

        $this->session->put('shopcart', $shopcartItems);

        return array_key_exists($shopcartDTO->productUuid, $shopcartItems);
    }

    public function show(): ?CartDTO
    {
        $shopcart = $this->session->get('shopcart', []);

        if (empty($shopcart)) {
            return null;
        }

        $shopcartItems = $this->shopcartService->getValidatedItems($shopcart);
        $this->session->put('shopcart', $shopcartItems);

        return $this->factory->createShopcartDTO($shopcartItems);
    }

    public function remove(string $productUuid): void
    {
        $shopcart = $this->session->get('shopcart', []);

        if (empty($shopcart)) {
            return;
        }

        unset($shopcart[$productUuid]);
        $this->session->put('shopcart', $shopcart);
    }
}
