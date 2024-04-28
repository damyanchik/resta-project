<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\ServiceProvider;

use App\Components\Cart\Application\Facade\CartFacade;
use App\Components\Cart\Infrastructure\Facade\CartApplicationFacade;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CartFacade::class, CartApplicationFacade::class);
    }
}
