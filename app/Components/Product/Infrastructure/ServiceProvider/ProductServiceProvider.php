<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\ServiceProvider;

use App\Components\Product\Application\Mapper\ProductModelMapper;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Infrastructure\Mapper\ProductModelApplicationMapper;
use App\Components\Product\Infrastructure\Repository\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ProductRepository::class, ProductRepository::class);
        $this->app->singleton(ProductModelMapper::class, ProductModelApplicationMapper::class);
    }
}
