<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use App\Components\Common\DTO\PriceDTO;
use App\Components\Common\EloquentRepository\EloquentDataBag;

class OrderItemFormableDTO implements EloquentDataBag
{
    public function __construct(
        public readonly string $productUuid,
        public readonly PriceDTO $price,
        public readonly int $quantity,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'product_uuid' => $this->productUuid,
            'unit_nett_price' => $this->price->nett,
            'unit_gross_price' => $this->price->gross,
            'quantity' => $this->quantity,
            'rate' => $this->price->rate,
            'sum_nett_price' => $this->price->nett->multiply($this->quantity),
            'sum_gross_price' => $this->price->gross->multiply($this->quantity),
        ];
    }
}
