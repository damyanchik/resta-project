<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Mapper;

use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use App\Components\Order\Domain\DTO\OrderItemDTO;
use App\Components\Order\Domain\Enum\OrderItemStatusEnum;
use Illuminate\Support\Collection;

class ProductModelMapper
{
    public function withItemsToOrderItem(Collection $products, Collection $items): Collection
    {
        return $products->map(function ($product) use ($items) {
            $matchedItem = $items->where('product_uuid', $product['uuid'])->first();

            if ($matchedItem) {
                return new OrderItemDTO(
                    productUuid: $product['uuid'],
                    subtotalUnitPrice: new Money($product['price'], Currency::EUR()),
                    totalUnitPrice: new Money($product['price'], Currency::EUR()),
                    subtotalPrice: new Money($product['price'] * $matchedItem['quantity'], Currency::EUR()),
                    totalPrice: new Money($product['price'] * $matchedItem['quantity'], Currency::EUR()),
                    quantity: (int) $matchedItem['quantity'],
                    status: OrderItemStatusEnum::PREPARING,
                    annotation: '',
                    orderNr: 0,
                );
            }
        });
    }
}
