<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Mapper;

use Akaunting\Money\Money;
use App\Components\Finance\Application\Calculator\PriceCalculator;
use App\Components\Order\Domain\DTO\OrderItemDTO;
use App\Components\Order\Domain\Enum\OrderItemStatusEnum;
use App\Components\Product\Application\Mapper\ProductModelMapper;
use Illuminate\Support\Collection;

class ProductModelApplicationMapper implements ProductModelMapper
{
    public function __construct(private readonly PriceCalculator $priceCalculator)
    {
    }

    public function withItemsToOrderItem(Collection $products, Collection $items): Collection
    {
        return $products->map(function ($product) use ($items) {
            $matchedItem = $items->where('product_uuid', $product['uuid'])->first();

            if ($matchedItem) {
                return new OrderItemDTO(
                    productUuid: $product['uuid'],
                    subtotalUnitPrice: $this->priceCalculator
                        ->calculateSubtotalAmount(Money::EUR($product['price'])),
                    totalUnitPrice: $this->priceCalculator
                        ->calculateTotalAmount(Money::EUR($product['price'])),
                    subtotalPrice: $this->priceCalculator
                        ->calculateSubtotalAmount(Money::EUR($product['price'] * $matchedItem['quantity'])),
                    totalPrice: $this->priceCalculator
                        ->calculateTotalAmount(Money::EUR($product['price'] * $matchedItem['quantity'])),
                    quantity: (int)$matchedItem['quantity'],
                    status: OrderItemStatusEnum::PREPARING,
                    annotation: '',
                    orderNr: 0,
                );
            }
        });
    }
}
