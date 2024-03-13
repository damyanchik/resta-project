<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Request;

use App\Components\User\Application\DTO\UserToggable;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class PatchUserStatusRequest extends FormRequest implements UserToggable
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'is_active' => ['required', 'integer', 'min:0', 'max:1'],
        ];
    }

    public function isActive(): int
    {
        return $this->integer('is_active');
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(new JsonResponse([
            'status' => 'failed',
            'errors' => $validator->errors(),
        ], 422));
    }
}
