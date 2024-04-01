<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Request;

use App\Components\Order\Application\DTO\OrderFormable;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class OrderRequest extends FormRequest implements OrderFormable
{
    public function rules(): array
    {
        return [
            'type' => ['required', 'string'],
            'payment_method' => ['nullable', 'string'],
            'annotation' => ['nullable', 'string'],
            'items.*' => ['required', 'array'],
            'items.*.quantity' => ['required'],
            'items.*.annotation' => ['nullable'],
            'items.*.product_uuid' => ['required'],
        ];
    }

    public function type(): OrderTypeEnum
    {
        return $this->enum('type', OrderTypeEnum::class);
    }

    public function paymentMethod(): string
    {
        return $this->string('payment_method')->toString();
    }

    public function annotation(): string
    {
        return $this->string('annotation')->toString();
    }

    public function items(): Collection
    {
        return $this->collect('items');
    }
}
