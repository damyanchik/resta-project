<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Request;

use App\Components\Order\Application\DTO\OrderFormable;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest implements OrderFormable
{
    public function rules(): array
    {
        return [
            'type' => ['required', 'string', Rule::enum(OrderTypeEnum::class)],
            'payment_method' => ['nullable', 'string'],
            'annotation' => ['nullable', 'string'],
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

    public function annotation(): ?string
    {
        return $this->string('annotation')->toString() ?? null;
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(new JsonResponse([
            'status' => 'failed',
            'errors' => $validator->errors(),
        ], 422));
    }
}
