<?php

declare(strict_types=1);

namespace App\Components\Order\Application\DTO;

use App\Components\Order\Domain\Enum\OrderTypeEnum;

interface OrderFormable
{
    public function type(): OrderTypeEnum;
    public function paymentMethod(): string;
    public function annotation(): ?string;
}
