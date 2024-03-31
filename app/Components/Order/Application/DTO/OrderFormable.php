<?php

declare(strict_types=1);

namespace App\Components\Order\Application\DTO;

use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;

interface OrderFormable
{
    public function status(): OrderStatusEnum;
    public function type(): OrderTypeEnum;
    public function subtotalAmount();
    public function totalAmount();
    public function paymentMethod(): string;
    public function isPaid(): bool;
    public function annotation(): string;
}
