<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Factory;

use App\Components\Shopcart\Domain\DTO\ShopcartDTO;

class ShopcartDTOFactory
{
    public function createShopcartDTO(
        int $quantity,
        string $productUuid,
    ): ShopcartDTO
    {
        return new ShopcartDTO(
            quantity: $quantity,
            productUuid: $productUuid,
        );
    }


}
