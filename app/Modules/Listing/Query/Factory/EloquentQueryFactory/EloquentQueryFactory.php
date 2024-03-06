<?php

declare(strict_types=1);

namespace App\Modules\Listing\Query\Factory\EloquentQueryFactory;

use App\Modules\Listing\Parameter\DTO\ParametersDTO;
use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\OrderQuery;
use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\QueryChainInterface;
use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\SelectQuery;
use App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain\WhereQuery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;


class EloquentQueryFactory implements QueryFactoryInterface
{
    public function __construct(private readonly QueryChainInterface $queryChain)
    {
    }

    public function createQueryByParametersAndModel(ParametersDTO $parametersDTO, Model $model): LengthAwarePaginator
    {
        $query = $model->newQuery();

        $this->queryChain
            ->setNext(new SelectQuery())
            ->setNext(new WhereQuery())
            ->setNext(new OrderQuery());

        $this->queryChain->build($parametersDTO, $query);

        return $query->paginate($parametersDTO->perPage);
    }
}
