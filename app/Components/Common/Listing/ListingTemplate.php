<?php

declare(strict_types=1);

namespace App\Components\Common\Listing;

use App\Components\Common\Listing\Parameter\DTO\ParametersDTO;
use App\Components\Common\Listing\Parameter\Factory\ParametersFactory;
use App\Components\Common\Listing\Parameter\Request\ParametersBag;
use App\Components\Common\Listing\Query\Factory\EloquentQueryFactory\QueryFactoryInterface;
use App\Components\Common\Listing\View\DTO\ListingViewDTO;
use App\Components\Common\Listing\View\Resolver\EloquentModelResolver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class ListingTemplate
{
    abstract protected function useModel(): Model;
    abstract protected function prepareColumns(): Collection;
    //abstract protected function createActions(): array;

    public function __construct(
        private readonly QueryFactoryInterface $queryFactory,
        private readonly ParametersFactory $parametersFactory,
    )
    {
    }

    public function create(ParametersBag $bag): ListingViewDTO
    {
        $parameters = $this->parametersFactory->createParameters($bag, $this->prepareColumns());
        $eloquentModel = EloquentModelResolver::setModel($this->getDataFromQuery($parameters));

        return new ListingViewDTO(
            items: $eloquentModel->resolveItems(),
            flags: $this->getColumnViewFlags()->toArray(),
        );
    }

    private function getDataFromQuery(ParametersDTO $parametersDTO): LengthAwarePaginator
    {
        return $this->queryFactory->createQueryByParametersAndModel($parametersDTO, $this->useModel());
    }

    private function getColumnViewFlags(): Collection
    {
        $columns = $this->prepareColumns();
        $flags = array_keys($columns->first());

        return collect($flags)->mapWithKeys(function ($key) use ($columns) {
            $filteredColumns = $columns->filter(function ($item) use ($key) {
                return $item[$key] === true;
            });
            return [$key => $filteredColumns->keys()->toArray()];
        });
    }
}
