<?php

declare(strict_types=1);

namespace App\Components\Cart\Application\Facade;

use App\Components\Cart\Application\DTO\CartFormable;
use App\Components\Cart\Domain\DTO\CartDTO;
use App\Components\Cart\Domain\DTO\CartFormableDTO;

interface CartFacade
{
    public function addItemToCart(string $uuid, CartFormable $cartFormable): bool;
    public function getCartItems(): CartDTO;
    public function getFormableCartItems(): CartFormableDTO;
    public function removeItemFromCart(string $uuid): bool;
    public function destroyCart(): bool;
    public function reloadCartItems(): bool;
}
