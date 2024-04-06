<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use Akaunting\Money\Money;
use App\Components\Common\EloquentRepository\EloquentDataBag;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use Illuminate\Support\Collection;

class OrderFormableDTO implements EloquentDataBag
{
    public function __construct(
        private readonly OrderStatusEnum $status,
        private readonly OrderTypeEnum $type,
        private readonly Money $subtotalAmount,
        private readonly Money $totalAmount,
        private readonly string $paymentMethod,
        private readonly bool $isPaid,
        private readonly string $annotation,
        private readonly Collection $items,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status->value,
            'type' => $this->type->value,
            'subtotal_amount' => $this->subtotalAmount->getAmount(),
            'total_amount' => $this->totalAmount->getAmount(),
            'payment_method' => $this->paymentMethod,
            'is_paid' => $this->isPaid,
            'annotation' => $this->annotation,
            'items' => $this->items->toArray(), //orderItemFormable
        ];
    }
}
