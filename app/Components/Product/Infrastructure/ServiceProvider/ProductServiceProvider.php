<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\ServiceProvider;

use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Infrastructure\Repository\ProductApplicationRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ProductRepository::class, ProductApplicationRepository::class);
    }
}
