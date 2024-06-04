<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use App\Components\Common\DTO\PriceDTO;

class OrderedProductDTO
{
    public function __construct(
        public readonly PriceDTO $price,
        public readonly int $stock,
        public readonly bool $isUnlimited,
        public readonly bool $isAvailable,
        public readonly ?string $categoryUuid,
    )
    {
    }
}
