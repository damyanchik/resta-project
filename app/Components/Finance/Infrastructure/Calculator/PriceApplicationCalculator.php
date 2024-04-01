<?php

declare(strict_types=1);

namespace App\Components\Finance\Infrastructure\Calculator;

use Akaunting\Money\Money;
use App\Components\Finance\Application\Calculator\PriceCalculator;

class PriceApplicationCalculator implements PriceCalculator
{
    public function calculateSubtotalUnit(Money $amount): Money
    {
        return $amount->subtract($this->calculateTaxAmount($amount));
    }

    public function calculateTotalUnit(Money $amount, int $discount = 0): Money
    {
        if ($discount === 0) {
            return $amount;
        }

        $subtotal = $this->calculateSubtotalUnit($amount);
        $discountAmount = $this->calculateDiscountAmount($subtotal, $discount);

        return $amount->subtract($discountAmount);
    }

    public function calculateTaxAmount(Money $amount, int $taxRate = 18): Money
    {
        return $amount->divide(100 + $taxRate)->multiply($taxRate);
    }

    public function calculateDiscountAmount(Money $amount, int $percentage): Money
    {
        return $amount->divide(100)->multiply($percentage);
    }
}
