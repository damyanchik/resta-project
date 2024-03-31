<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use Illuminate\Support\Collection;

class OrderDTO
{
    public function __construct(
        private readonly OrderStatusEnum $status,
        private readonly OrderTypeEnum $type,
        private readonly int $subtotalAmount,
        private readonly int $totalAmount,
        private readonly ?string $paymentMethod,
        private readonly bool $isPaid,
        private readonly ?string $annotation,
        private readonly Collection $orderItems,
    )
    {
    }
}
