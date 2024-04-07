<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Mapper;

use Akaunting\Money\Money;
use App\Components\Finance\Application\Calculator\PriceCalculator;
use App\Components\Order\Domain\DTO\OrderItemDTO;
use App\Components\Order\Domain\Enum\OrderItemStatusEnum;
use App\Components\Product\Application\Mapper\ProductModelMapper;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Domain\DTO\ProductShortDTO;
use App\Components\Shopcart\Application\Factory\ShopcartDTOFactory;
use Illuminate\Support\Collection;

class ProductModelApplicationMapper implements ProductModelMapper
{
    public function __construct(
        private readonly PriceCalculator $priceCalculator,
    )
    {
    }

    public function withItemsToOrderItem(Collection $products, Collection $items): Collection
    {
        return $products->map(function ($product) use ($items) {
            $matchedItem = $items->where('product_uuid', $product['uuid'])->first();

            if ($matchedItem) {
                $subtotalUnit = $this->priceCalculator->calculateSubtotalUnit(Money::EUR($product['price']));
                $totalUnit = $this->priceCalculator->calculateTotalUnit(Money::EUR($product['price']));

                return new OrderItemDTO(
                    productUuid: $product['uuid'],
                    subtotalUnitPrice: $subtotalUnit,
                    totalUnitPrice: $totalUnit,
                    quantity: (int)$matchedItem['quantity'],
                    status: OrderItemStatusEnum::PREPARING,
                    annotation: '',
                    orderNr: 0,
                );
            }
        });
    }
}
