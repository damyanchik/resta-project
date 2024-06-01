<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use Akaunting\Money\Money;
use App\Components\Common\DTO\PriceDTO;
use App\Components\Order\Domain\Enum\OrderItemStatusEnum;

class OrderItemDTO
{
    public function __construct(
        public readonly string              $productUuid,
        public readonly Money               $sumNettPrice,
        public readonly Money               $sumGrossPrice,
        public readonly PriceDTO            $unitPrice,
        public readonly int                 $quantity,
        public readonly OrderItemStatusEnum $status,
        public readonly string              $message,
        public readonly int                 $orderNr,
    )
    {
    }
}
