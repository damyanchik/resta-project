<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\DTO;

use Akaunting\Money\Money;
use App\Components\Common\EloquentRepository\EloquentDataBag;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;

class OrderFormableDTO implements EloquentDataBag
{
    public function __construct(
        private readonly OrderStatusEnum $status,
        private readonly OrderTypeEnum   $type,
        private readonly Money           $nettAmount,
        private readonly Money           $grossAmount,
        private readonly string          $paymentMethod,
        private readonly bool            $isPaid,
        private readonly string          $annotation,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status->value,
            'type' => $this->type->value,
            'nett_amount' => $this->nettAmount->getAmount(),
            'gross_amount' => $this->grossAmount->getAmount(),
            'payment_method' => $this->paymentMethod,
            'is_paid' => $this->isPaid,
            'annotation' => $this->annotation,
        ];
    }
}
