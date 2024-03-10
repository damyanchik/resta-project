<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\ServiceProvider;

use App\Components\Common\Listing\Parameter\Factory\ParametersFactory;
use App\Components\Common\Listing\Query\ChainOfResponsibility\EloquentQueryChain\QueryChain;
use App\Components\Common\Listing\Query\ChainOfResponsibility\EloquentQueryChain\QueryChainInterface;
use App\Components\Common\Listing\Query\Factory\EloquentQueryFactory\EloquentQueryFactory;
use App\Components\Common\Listing\Query\Factory\EloquentQueryFactory\QueryFactoryInterface;
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
