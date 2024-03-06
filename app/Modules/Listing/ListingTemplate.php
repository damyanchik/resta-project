<?php

declare(strict_types=1);

namespace App\Modules\Listing;

use App\Modules\Listing\Parameter\DTO\ParametersDTO;
use App\Modules\Listing\Parameter\Factory\ParametersFactory;
use App\Modules\Listing\Parameter\Request\ParametersBag;
use App\Modules\Listing\Query\Factory\EloquentQueryFactory\QueryFactoryInterface;
use App\Modules\Listing\View\DTO\ViewDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class ListingTemplate
{
    abstract protected function useModel(): Model;
    abstract protected function prepareColumns(): Collection;
    abstract protected function createActions(): array;

    public function __construct(
        private readonly QueryFactoryInterface $queryFactory,
        private readonly ParametersFactory $parametersFactory,
    )
    {
    }

    public function create(ParametersBag $bag): ViewDTO
    {
        $parameters = $this->parametersFactory->createParameters($bag, $this->prepareColumns());

        return new ViewDTO(
            viewData: $this->getDataFromQuery($parameters),
            viewFlags: $this->getColumnViewFlags(),
        );
    }

    private function getDataFromQuery(ParametersDTO $parametersDTO): LengthAwarePaginator
    {
        return $this->queryFactory->createQueryByParametersAndModel($parametersDTO, $this->useModel());
    }

    private function getColumnViewFlags(): Collection
    {
        $flags = array_keys($this->prepareColumns()->first());
        $columns = $this->prepareColumns();

        return collect($flags)->mapWithKeys(function ($key) use ($columns) {
            $filteredColumns = $columns->filter(function ($item) use ($key) {
                return $item[$key] === true;
            });
            return [$key => $filteredColumns->keys()->toArray()];
        });
    }
}
