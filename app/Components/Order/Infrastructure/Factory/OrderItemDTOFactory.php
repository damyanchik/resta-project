<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory;

use App\Components\Common\DTO\PriceDTO;
use App\Components\Finance\Application\Calculator\PriceCalculator;
use App\Components\Order\Domain\DTO\OrderItemFormableDTO;
use App\Components\Order\Domain\Enum\OrderItemAttributeEnum;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Infrastructure\Validation\ProductValidation;
use Illuminate\Support\Collection;

class OrderItemDTOFactory
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly PriceCalculator   $priceCalculator,
    )
    {
    }
    
    public function createItemFormableDTOsByFormableItems(Collection $formableOrderItems): Collection
    {
        $productBasicDTOs = $this->productRepository->getProductBasicDTOs(
            uuids: $formableOrderItems->map(fn($item) => $item[OrderItemAttributeEnum::PRODUCT_UUID->value]),
        );

        return $formableOrderItems->map(function ($formableItem) use ($productBasicDTOs) {
            $product = $productBasicDTOs->get($formableItem[OrderItemAttributeEnum::PRODUCT_UUID]);

            ProductValidation::issetProduct($product);
            ProductValidation::isAvailableProduct($product->isAvailable);
            ProductValidation::isProductStockHigherOrEqual(
                needed: $formableItem[OrderItemAttributeEnum::QUANTITY],
                stock: $product->stock,
                isUnlimited: $product->isUnlimited,
            );

            return new OrderItemFormableDTO(
                productUuid: $formableItem[OrderItemAttributeEnum::PRODUCT_UUID],
                price: new PriceDTO(
                    nett: $this->priceCalculator->calculateNettFromGross($product->price, $product->rate),
                    gross: $product->price,
                    rate: $product->rate,
                ),
                quantity: $formableItem[OrderItemAttributeEnum::QUANTITY],
            );
        });
    }
}
