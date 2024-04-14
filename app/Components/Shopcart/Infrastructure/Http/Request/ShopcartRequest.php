<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Http\Request;

use App\Components\Shopcart\Application\DTO\ShopcartFormable;
use Illuminate\Foundation\Http\FormRequest;

class ShopcartRequest extends FormRequest implements ShopcartFormable
{
    public function rules(): array
    {
        return [
            'quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function quantity(): int
    {
        return $this->integer('quantity');
    }
}
