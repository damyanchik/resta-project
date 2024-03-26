<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Request;

use App\Components\Order\Application\DTO\OrderCreatable;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest implements OrderCreatable
{
    public function rules(): array
    {
        return [
            'status' => ['required', 'string'],
            'type' => ['required', 'string'],
            'subtotal_amount' => ['required', 'float'],
            'total_amount' => ['required', 'float'],
            'payment_method' => ['required', 'integer'],
            'is_paid' => ['nullable', 'boolean'],
            'annotation' => ['required', 'string'],
        ];
    }

    public function status(): string
    {
        return $this->string('status')->toString();
    }

    public function type(): string
    {
        return $this->string('type')->toString();
    }

    public function subtotalAmount(): float
    {
        return $this->float('subtotal_amount');
    }

    public function totalAmount(): float
    {
        return $this->float('total_amount');
    }

    public function paymentMethod(): int
    {
        return $this->integer('payment_method');
    }

    public function isPaid(): bool
    {
        return $this->boolean('is_paid');
    }

    public function annotation(): string
    {
        return $this->string('annotation')->toString();
    }
}
