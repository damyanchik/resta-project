<?php

declare(strict_types=1);

namespace App\Components\Order\Presentation\ViewModel;

class OrderViewModel
{
    public function __construct(
        private readonly string $status,
        private readonly string $type,
        private readonly string $nettAmount,
        private readonly string $grossAmount,
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
            'nett_amount' => $this->nettAmount,
            'gross_amount' => $this->grossAmount,
            'payment_method' => $this->paymentMethod,
            'is_paid' => $this->isPaid,
            'annotation' => $this->annotation,
            'order_items' => $this->orderItems,
        ];
    }
}
