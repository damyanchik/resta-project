<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'required', 'min:2'],
            'is_visible' => ['integer', 'required', 'min:0', 'max:1'],
            'orderDirection' => ['integer', 'required'],
        ];
    }
}
