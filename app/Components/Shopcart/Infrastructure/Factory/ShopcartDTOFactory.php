<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Factory;

use App\Components\Product\Domain\DTO\ProductDTO;
use App\Components\Shopcart\Domain\DTO\ShopcartDTO;
use App\Components\Shopcart\Domain\DTO\ShopcartItemDTO;
use App\Components\Shopcart\Domain\DTO\ShopcartItemFormableDTO;

class ShopcartDTOFactory
{
    public function createShopcartItemFormableDTO(
        int $quantity,
        string $productUuid,
    ): ShopcartItemFormableDTO
    {
        return new ShopcartItemFormableDTO(
            quantity: $quantity,
            productUuid: $productUuid,
        );
    }

    public function createShopcartDTO(array $shopcart): ShopcartDTO
    {
        //pobieranie product
        //w kolekcje + shopcartItemDto
        return new ShopcartDTO();
    }

    //+ productDTO
    public function createShopcartItemDTO(
        int $quantity,
        ProductDTO $productDTO,
    ): ShopcartItemDTO
    {

    }


}
