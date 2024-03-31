<?php

declare(strict_types=1);

namespace App\Components\Order\Presentation\ViewModel;

class OrderItemViewModel
{
    public function __construct(
        public readonly string $productUuid,
        public readonly string $subtotalUnitPrice,
        public readonly string $totalUnitPrice,
        public readonly string $subtotalPrice,
        public readonly string $totalPrice,
        public readonly int $quantity,
        public readonly string $status,
        public readonly string $annotation,
        public readonly int $orderNr,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'subtotal_unit_price' => $this->subtotalUnitPrice,
            'total_unit_price' => $this->totalUnitPrice,
            'subtotal_price' => $this->subtotalPrice,
            'total_price' => $this->totalPrice,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'annotation' => $this->annotation,
            'order_nr' => $this->orderNr,
            'product_uuid' => $this->productUuid,
        ];
    }
}
