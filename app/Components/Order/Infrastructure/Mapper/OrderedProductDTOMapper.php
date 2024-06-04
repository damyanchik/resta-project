<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Mapper;

use App\Components\Common\DTO\PriceDTO;
use App\Components\Finance\Application\Calculator\PriceCalculator;
use App\Components\Order\Domain\DTO\OrderedProductDTO;
use App\Components\Product\Domain\Model\Product;

class OrderedProductDTOMapper
{
    public function __construct(private readonly PriceCalculator $priceCalculator)
    {
    }

    public function fromProductModel(Product $product): OrderedProductDTO
    {
        return new OrderedProductDTO(
            price: new PriceDTO(
                nett: $this->priceCalculator->calculateNettFromGross($product->price, $product->rate),
                gross: $product->price,
                rate: $product->rate,
            ),
            stock: $product->stock,
            isUnlimited: $product->is_unlimited,
            isAvailable: $product->is_available,
            categoryUuid: $product->category_uuid,
        );
    }
}
