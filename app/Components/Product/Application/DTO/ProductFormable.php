<?php

declare(strict_types=1);

namespace App\Components\Product\Application\DTO;

use Akaunting\Money\Money;

interface ProductFormable
{
    public function name(): string;
    public function description(): string;
    public function stock(): int;
    public function price(): Money;
    public function rate(): int;
    public function isUnlimited(): bool;
    public function isVegetarian(): bool;
    public function isSpicy(): bool;
    public function isAvailable(): bool;
    public function categoryUuid(): string;
    public function orderNr(): int;
}
