<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Request;

use App\Components\Order\Application\DTO\OrderFormable;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class OrderRequest extends FormRequest implements OrderFormable
{
    public function rules(): array
    {
        return [
            'status' => ['required', 'string'],
            'type' => ['required', 'string'],
            'payment_method' => ['nullable', 'string'],
            'annotation' => ['nullable', 'string'],
            'is_paid' => ['nullable', 'boolean'],
            'items.*' => ['required', 'array'],
            'items.*.quantity' => ['required'],
            'items.*.annotation' => ['nullable'],
            'items.*.product_uuid' => ['required'],
        ];
    }

    public function status(): OrderStatusEnum
    {
        return $this->enum('status', OrderStatusEnum::class);
    }

    public function type(): OrderTypeEnum
    {
        return $this->enum('type', OrderTypeEnum::class);
    }

    public function paymentMethod(): string
    {
        return $this->string('payment_method')->toString();
    }

    public function isPaid(): bool
    {
        return $this->boolean('is_paid');
    }

    public function annotation(): ?string
    {
        return $this->string('annotation')->toString() ?? null;
    }

    public function items(): Collection
    {
        return $this->collect('items');
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(new JsonResponse([
            'status' => 'failed',
            'errors' => $validator->errors(),
        ], 422));
    }
}
