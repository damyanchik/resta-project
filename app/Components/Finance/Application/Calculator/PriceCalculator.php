<?php

declare(strict_types=1);

namespace App\Components\Finance\Application\Calculator;

use Akaunting\Money\Money;

interface PriceCalculator
{
    public function calculateNettFromGross(Money $amount, int $taxRate): Money;
    public function calculateGrossFromNettUnit(Money $amount, int $taxRate): Money;
    public function calculateTaxAmount(Money $amount, int $taxRate): Money;
    public function calculateDiscountAmount(Money $amount, int $percentage): Money;
}
