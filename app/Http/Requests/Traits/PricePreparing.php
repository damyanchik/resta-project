<?php

declare(strict_types=1);

namespace App\Http\Requests\Traits;

use App\Helpers\PriceHelper;

trait PricePreparing
{
    protected function preparePriceForValidation(): void
    {
        if ($this->has('price')) {
            $price = str_replace(',', '.', $this->input('price'));
            $this->merge(['price' => PriceHelper::convertFloatToIntPrice((float) $price)]);
        }
    }
}
