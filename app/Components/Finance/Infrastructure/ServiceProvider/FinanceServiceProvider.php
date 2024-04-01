<?php

declare(strict_types=1);

namespace App\Components\Finance\Infrastructure\ServiceProvider;

use App\Components\Finance\Application\Calculator\PriceCalculator;
use App\Components\Finance\Infrastructure\Calculator\PriceApplicationCalculator;
use Illuminate\Support\ServiceProvider;

class FinanceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(PriceCalculator::class, PriceApplicationCalculator::class);
    }
}
