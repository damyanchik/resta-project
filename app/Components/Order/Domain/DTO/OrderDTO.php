<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use Akaunting\Money\Money;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use Illuminate\Support\Collection;

class OrderDTO
{
    public function __construct(
        public readonly OrderStatusEnum $status,
        public readonly OrderTypeEnum   $type,
        public readonly Money           $nettAmount,
        public readonly Money           $grossAmount,
        public readonly ?string         $paymentMethod,
        public readonly bool            $isPaid,
        public readonly ?string         $annotation,
        public readonly Collection      $orderItems,
    )
    {
    }
}
