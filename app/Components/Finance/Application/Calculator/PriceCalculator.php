<?php

declare(strict_types=1);

namespace App\Components\Finance\Application\Calculator;

use Akaunting\Money\Money;

interface PriceCalculator
{
    public function calculateSubtotalAmount(Money $amount): Money;
    public function calculateTotalAmount(Money $amount, int $discount = 0): Money;
    public function calculateTaxAmount(Money $amount, int $taxRate = 18): Money;
    public function calculateDiscountAmount(Money $amount, int $percentage): Money;
}
