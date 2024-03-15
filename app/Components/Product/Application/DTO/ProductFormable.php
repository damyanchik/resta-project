<?php

declare(strict_types=1);

namespace App\Components\Product\Application\DTO;

interface ProductFormable
{
    public function productName(): string;
    public function productDescription(): string;
    public function productStock(): int;
    public function productPrice(): int;
    public function productIsUnlimited(): int;
    public function productIsVegetarian(): int;
    public function productIsSpicy(): int;
    public function productIsAvailable(): int;
    public function productCategoryId(): int;
}
