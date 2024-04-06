<?php

declare(strict_types=1);

namespace App\Components\Product\Application\DTO;

interface ProductFormable
{
    public function productName(): string;
    public function productDescription(): string;
    public function productStock(): int;
    public function productPrice(): int;
    public function productIsUnlimited(): bool;
    public function productIsVegetarian(): bool;
    public function productIsSpicy(): bool;
    public function productIsAvailable(): bool;
    public function productCategoryId(): int;
    public function productOrderNr(): int;
}
