<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\DTO;

class ProductAvailableDTO
{
    public function __construct(
        public readonly int $stock,
        public readonly bool $isUnlimited,
        public readonly bool $isAvailable,
    )
    {
    }
}
