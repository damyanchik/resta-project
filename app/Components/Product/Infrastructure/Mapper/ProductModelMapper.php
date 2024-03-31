<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Mapper;

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
                    subtotalUnitPrice: Money::EUR($product['price']),
                    totalUnitPrice: Money::EUR($product['price']),
                    subtotalPrice: Money::EUR($product['price'] * $matchedItem['quantity']),
                    totalPrice: Money::EUR($product['price'] * $matchedItem['quantity']),
                    quantity: (int) $matchedItem['quantity'],
                    status: OrderItemStatusEnum::PREPARING,
                    annotation: '',
                    orderNr: 0,
                );
            }
        });
    }
}
