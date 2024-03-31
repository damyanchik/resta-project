<?php

declare(strict_types=1);

namespace App\Components\Order\Presentation\ViewModel;

use Illuminate\Support\Collection;

class OrderViewModel
{
    public function __construct(
        private readonly string $status,
        private readonly string $type,
        private readonly string $subtotalAmount,
        private readonly string $totalAmount,
        private readonly string $paymentMethod,
        private readonly bool $isPaid,
        private readonly string $annotation,
        private readonly array $orderItems,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'type' => $this->type,
            'subtotal_amount' => $this->subtotalAmount,
            'total_amount' => $this->totalAmount,
            'payment_method' => $this->paymentMethod,
            'is_paid' => $this->isPaid,
            'annotation' => $this->annotation,
            'order_items' => $this->orderItems,
        ];
    }
}
