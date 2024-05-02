<?php

declare(strict_types=1);

namespace App\Components\Order\Application\DTO;

use App\Components\Order\Domain\Enum\OrderStatusEnum;
use Illuminate\Support\Collection;

interface OrderExtendedFormable extends OrderFormable
{
    public function status(): OrderStatusEnum;
    public function isPaid(): bool;
    public function items(): Collection;
}
