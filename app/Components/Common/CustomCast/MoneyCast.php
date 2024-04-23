<?php

declare(strict_types=1);

namespace App\Components\Common\CustomCast;

use Akaunting\Money\Money;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class MoneyCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): Money
    {
        return Money::EUR($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        return $value;
    }
}
