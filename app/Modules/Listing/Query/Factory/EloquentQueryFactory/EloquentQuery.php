<?php

declare(strict_types=1);

namespace App\Modules\Listing\Query\Factory\EloquentQueryFactory;

use App\Modules\Listing\Parameter\DTO\ParametersDTO;
use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\OrderQuery;
use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\PaginateQuery;
use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\QueryChainInterface;
use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\SelectQuery;
use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\WhereQuery;
use App\Modules\Listing\Query\Factory\QueryInterface;
use Illuminate\Database\Eloquent\Builder;

class EloquentQuery implements QueryInterface
{
    public function __construct(private readonly QueryChainInterface $queryBuilderChain)
    {}

    public function getCompletedData(ParametersDTO $parametersDTO, Builder $builder): void
    {
        $this->queryBuilderChain
            ->setNext(new SelectQuery())
            ->setNext(new WhereQuery())
            ->setNext(new OrderQuery())
            ->setNext(new PaginateQuery());

        $this->queryBuilderChain->build($parametersDTO, $builder);
    }
}
