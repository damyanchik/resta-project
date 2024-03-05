<?php

declare(strict_types=1);

namespace App\Modules\Listing\Query\Factory\EloquentQueryFactory;

use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\QueryChain;
use App\Modules\Listing\Query\Factory\QueryFactoryInterface;

class EloquentQueryFactory implements QueryFactoryInterface
{
    public function createListing(): EloquentQuery
    {
        return new EloquentQuery(new QueryChain());
    }
}
