<?php

declare(strict_types=1);

namespace App\Components\Order\Presentation\ViewModel;

class OrderItemViewModel
{
    public function __construct(
        public readonly string  $productUuid,
        public readonly string  $unitNettPrice,
        public readonly string  $unitGrossPrice,
        public readonly string  $sumNettPrice,
        public readonly string  $sumGrossPrice,
        public readonly int     $rate,
        public readonly int     $quantity,
        public readonly string  $status,
        public readonly ?string $message,
        public readonly int     $orderNr,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'nett_unit_price' => $this->unitNettPrice,
            'gross_unit_price' => $this->unitGrossPrice,
            'sum_nett_price' => $this->sumNettPrice,
            'sum_gross_price' => $this->sumGrossPrice,
            'quantity' => $this->quantity,
            'rate' => $this->rate,
            'status' => $this->status,
            'message' => $this->message,
            'order_nr' => $this->orderNr,
            'product_uuid' => $this->productUuid,
        ];
    }
}
