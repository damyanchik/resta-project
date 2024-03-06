<?php

declare(strict_types=1);

namespace App\Modules\Listing\ServiceProvider;

use App\Modules\Listing\Parameter\Factory\ParametersFactory;
use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\QueryChain;
use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\QueryChainInterface;
use App\Modules\Listing\Query\Factory\EloquentQueryFactory\EloquentQueryFactory;
use App\Modules\Listing\Query\Factory\EloquentQueryFactory\QueryFactoryInterface;
use Illuminate\Support\ServiceProvider;

class ListingProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(QueryFactoryInterface::class, EloquentQueryFactory::class);
        $this->app->singleton(QueryChainInterface::class, QueryChain::class);
        $this->app->bind(ParametersFactory::class);
    }
}
