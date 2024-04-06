<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Http\Request;

use App\Components\Product\Application\DTO\ProductFormable;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest implements ProductFormable
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
            'stock' => ['integer', 'required', 'min:0'],
            'price' => ['integer', 'required', 'min:0'],
            'is_unlimited' => ['integer', 'nullable', 'min:0', 'max:1'],
            'is_vegetarian' => ['integer', 'nullable', 'min:0', 'max:1'],
            'is_spicy' => ['integer', 'nullable', 'min:0', 'max:1'],
            'is_available' => ['integer', 'nullable', 'min:0', 'max:1'],
            'category_id' => ['integer', 'nullable', 'min:0'],
            'order_id' => ['integer', 'nullable'],
        ];
    }

    public function productName(): string
    {
        return $this->string('name')->toString();
    }

    public function productDescription(): string
    {
        return $this->string('description')->toString();
    }

    public function productStock(): int
    {
        return $this->integer('stock');
    }

    public function productPrice(): int
    {
        return $this->integer('price');
    }

    public function productStatus(): string
    {
        return $this->string('status')->toString();
    }

    public function productIsUnlimited(): bool
    {
        return $this->boolean('is_unlimited');
    }

    public function productIsVegetarian(): bool
    {
        return $this->boolean('is_vegetarian');
    }

    public function productIsSpicy(): bool
    {
        return $this->boolean('is_spicy');
    }

    public function productIsAvailable(): bool
    {
        return $this->boolean('is_available');
    }

    public function productCategoryId(): int
    {
        return $this->integer('category_id');
    }

    public function productOrderNr(): int
    {
        return $this->integer('order_nr');
    }
}
