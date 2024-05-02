<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use Akaunting\Money\Money;
use App\Components\Common\DTO\PriceDTO;
use App\Components\Common\EloquentRepository\EloquentDataBag;
use App\Components\Order\Domain\Enum\OrderItemStatusEnum;

class OrderItemFormableDTO implements EloquentDataBag
{
    public function __construct(
        public readonly OrderItemStatusEnum $status,
        public readonly string $productUuid,
        public readonly PriceDTO $price,
        public readonly int $quantity,
    )
    {
    }

    public function sumNettPrice(): Money
    {
        return $this->price->nett->multiply($this->quantity);
    }

    public function sumGrossPrice(): Money
    {
        return $this->price->gross->multiply($this->quantity);
    }

    public function toArray(): array
    {
        return [
            'product_uuid' => $this->productUuid,
            'status' => $this->status->value,
            'unit_nett_price' => $this->price->nett->getAmount(),
            'unit_gross_price' => $this->price->gross->getAmount(),
            'quantity' => $this->quantity,
            'rate' => $this->price->rate,
            'sum_nett_price' => $this->sumNettPrice()->getAmount(),
            'sum_gross_price' => $this->sumGrossPrice()->getAmount(),
        ];
    }
}
