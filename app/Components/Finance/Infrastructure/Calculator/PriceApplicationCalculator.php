<?php

declare(strict_types=1);

namespace App\Components\Finance\Infrastructure\Calculator;

use Akaunting\Money\Money;
use App\Components\Finance\Application\Calculator\PriceCalculator;

class PriceApplicationCalculator implements PriceCalculator
{
    public function calculateNettFromGross(Money $amount, int $taxRate): Money
    {
        return $amount->subtract($this->calculateTaxAmount($amount, $taxRate));
    }

    public function calculateGrossFromNettUnit(Money $amount, int $taxRate): Money
    {
        $subtotal = $this->calculateNettFromGross($amount, $taxRate);

        return $amount->subtract($subtotal);
    }

    public function calculateTaxAmount(Money $amount, int $taxRate): Money
    {
        return $amount->divide(100 + $taxRate)->multiply($taxRate);
    }

    //przeniesienie
    public function calculateDiscountAmount(Money $amount, int $percentage): Money
    {
        return $amount->divide(100)->multiply($percentage);
    }
}
