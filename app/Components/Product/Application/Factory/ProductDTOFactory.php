<?php

declare(strict_types=1);

namespace App\Components\Product\Application\Factory;

use App\Components\Product\Application\DTO\ProductFormable;
use App\Components\Product\Domain\DTO\ProductDTO;
use App\Components\Product\Domain\DTO\ProductFormableDTO;
use App\Components\Product\Domain\Model\Product;
use Illuminate\Support\Collection;

interface ProductDTOFactory
{
    public function createProductFormationDTO(ProductFormable $productFormable): ProductFormableDTO;
    public function createProductDTO(Product $product): ProductDTO;
    public function createProductShortDTOs(array $uuids): Collection;
}
