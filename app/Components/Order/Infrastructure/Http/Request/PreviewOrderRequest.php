<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Request;

use App\Components\Order\Application\DTO\OrderPreviewable;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class PreviewOrderRequest extends FormRequest implements OrderPreviewable
{
    public function rules(): array
    {
        return [
            'type' => ['required', 'string'],
            'payment_method' => ['required', 'string'],
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

    public function items(): Collection
    {
        return $this->collect('items');
    }
}
