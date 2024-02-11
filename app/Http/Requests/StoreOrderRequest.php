<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'amount' => ['integer', 'required', 'min:1'],
            'total_price' => ['integer', 'required', 'min:1'],
            'state' => ['integer', 'required'],
            'payment_method' => ['integer', 'nullable', 'min:0'],
            'is_paid' => ['date', 'nullable'],
            'user_message' => ['string', 'nullable'],
        ];
    }
}
