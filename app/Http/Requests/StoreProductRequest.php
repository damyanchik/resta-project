<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'description' => ['string', 'required'],
            'availability' => ['integer', 'nullable'],
            'stock' => ['integer', 'required', 'min:0'],
            'price' => ['integer', 'required', 'min:0'],
            'is_unlimited_stock' => ['integer', 'nullable'],
            'is_vegetarian' => ['integer', 'nullable'],
            'is_spicy' => ['integer', 'nullable'],
        ];
    }
}
