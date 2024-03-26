<?php

declare(strict_types=1);

namespace App\Components\Order\Application\DTO;

interface OrderCreatable
{
    public function status(): string;
    public function type(): string;
    public function subtotalAmount(): float;
    public function totalAmount(): float;
    public function paymentMethod(): int;
    public function isPaid(): bool;
    public function annotation(): string;
}
