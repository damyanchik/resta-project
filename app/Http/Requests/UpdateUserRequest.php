<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            //'password' => ['required', 'min:6'],
            'is_active' => ['integer', 'nullable', 'min:0', 'max:1'],
            'role_id' => ['integer', 'nullable'],
        ];
    }
}
