<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use App\Components\Common\EloquentRepository\EloquentDataBag;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;

class OrderFormableDTO implements EloquentDataBag
{
    public function __construct(
        private readonly OrderStatusEnum $status,
        private readonly OrderTypeEnum $type,
        private readonly int $subtotalAmount,
        private readonly int $totalAmount,
        private readonly string $paymentMethod,
        private readonly bool $isPaid,
        private readonly string $annotation,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status->value,
            'type' => $this->type->value,
            'subtotal_amount' => $this->subtotalAmount,
            'total_amount' => $this->totalAmount,
            'payment_method' => $this->paymentMethod,
            'is_paid' => $this->isPaid,
            'annotation' => $this->annotation,
        ];
    }
}
