<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Requests\Traits\PricePreparing;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    use PricePreparing;

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->preparePriceForValidation();
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'description' => ['string', 'required'],
            'stock' => ['integer', 'required', 'min:0'],
            'price' => ['integer', 'required', 'min:0'],
            'is_unlimited' => ['integer', 'nullable', 'min:0', 'max:1'],
            'is_vegetarian' => ['integer', 'nullable', 'min:0', 'max:1'],
            'is_spicy' => ['integer', 'nullable', 'min:0', 'max:1'],
            'is_available' => ['integer', 'nullable', 'min:0', 'max:1'],
            'category_id' => ['integer', 'nullable', 'min:0'],
        ];
    }
}
