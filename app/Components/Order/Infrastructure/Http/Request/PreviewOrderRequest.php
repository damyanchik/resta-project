<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Request;

use App\Components\Order\Domain\Enum\OrderTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class PreviewOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required', 'string'],
            'payment_method' => ['required', 'string'],
            'annotation' => ['nullable', 'string'],
            'items.*' => ['required', 'array'],
            'items.*.subtotal_unit_price' => ['required'],
            'items.*.total_unit_price' => ['required'],
            'items.*.subtotal_price' => ['required'],
            'items.*.total_price' => ['required'],
            'items.*.quantity' => ['required'],
            'items.*.annotation' => ['nullable'],
            'items.*.product_uuid' => ['required'],
        ];
    }

    public function type(): OrderTypeEnum
    {
        return $this->enum('type', OrderTypeEnum::class);
    }

    public function subtotalAmount(): float
    {
        return $this->float('subtotal_amount');
    }

    public function totalAmount(): float
    {
        return $this->float('total_amount');
    }

    public function paymentMethod(): string
    {
        return $this->string('payment_method')->toString();
    }

    public function annotation(): string
    {
        return $this->string('annotation')->toString();
    }


}
