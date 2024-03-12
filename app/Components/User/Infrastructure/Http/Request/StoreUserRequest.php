<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Request;

use App\Components\User\Application\DTO\UserCreatable;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class StoreUserRequest extends FormRequest implements UserCreatable
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'required', 'min:2'],
            'surname' => ['string', 'required', 'min:2'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
//            'is_active' => ['integer', 'nullable', 'min:0', 'max:1'],
//            'role' => ['integer', 'nullable'],
        ];
    }

    public function userName(): string
    {
        return $this->string('name')->value();
    }

    public function userSurname(): string
    {
        return $this->string('surname')->value();
    }

    public function userEmail(): string
    {
        return $this->string('email')->value();
    }

    public function userPassword(): string
    {
        return $this->string('password')->value();
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(new JsonResponse([
            'status' => 'failed',
            'errors' => $validator->errors(),
        ], 422));
    }
}
