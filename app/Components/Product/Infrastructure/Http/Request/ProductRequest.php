<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Http\Request;

use Akaunting\Money\Money;
use App\Components\Product\Application\DTO\ProductFormable;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest implements ProductFormable
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'description' => ['string', 'nullable'],
            'stock' => ['integer', 'required', 'min:0'],
            'price' => ['integer', 'required', 'min:0'],
            'rate' => ['integer', 'nullable', 'min:0', 'max:99'],
            'is_unlimited' => ['integer', 'nullable', 'min:0', 'max:1'],
            'is_vegetarian' => ['integer', 'nullable', 'min:0', 'max:1'],
            'is_spicy' => ['integer', 'nullable', 'min:0', 'max:1'],
            'is_available' => ['integer', 'nullable', 'min:0', 'max:1'],
            'category_id' => ['integer', 'nullable', 'min:0'],
            'order_id' => ['integer', 'nullable'],
        ];
    }

    public function name(): string
    {
        return $this->string('name')->toString();
    }

    public function description(): string
    {
        return $this->string('description')->toString();
    }

    public function stock(): int
    {
        return $this->integer('stock');
    }

    public function price(): Money
    {
        return Money::EUR($this->float('price'));
    }

    public function rate(): int
    {
        return $this->integer('rate');
    }

    public function isUnlimited(): bool
    {
        return $this->boolean('is_unlimited');
    }

    public function isVegetarian(): bool
    {
        return $this->boolean('is_vegetarian');
    }

    public function isSpicy(): bool
    {
        return $this->boolean('is_spicy');
    }

    public function isAvailable(): bool
    {
        return $this->boolean('is_available');
    }

    public function categoryUuid(): string
    {
        return $this->string('category_uuid')->toString();
    }

    public function orderNr(): int
    {
        return $this->integer('order_nr');
    }
}
