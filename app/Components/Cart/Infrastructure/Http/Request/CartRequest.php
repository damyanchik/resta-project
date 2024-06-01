<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Request;

use App\Components\Cart\Application\DTO\CartFormable;
use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest implements CartFormable
{
    private const QUANTITY = 'quantity';

    public function rules(): array
    {
        return [
            self::QUANTITY => ['required', 'integer', 'min:1'],
        ];
    }

    public function quantity(): int
    {
        return $this->integer(self::QUANTITY);
    }
}
