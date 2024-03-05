<?php

declare(strict_types=1);

namespace App\Modules\Listing\ViewModel\TemplateMethod;

use App\Modules\Listing\Parameter\Factory\ParametersFactory;
use App\Modules\Listing\Parameter\Request\ParametersBag;
use App\Modules\Listing\Query\Factory\QueryFactoryInterface;
use App\Modules\Listing\ViewModel\DTO\ViewDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class ListingTemplate
{
    abstract protected function useModel(): Model;
    abstract protected function createColumns(): array;
    abstract protected function createActions(): array;

    public function __construct(
        private readonly QueryFactoryInterface $queryFactory,
        private readonly ParametersFactory $parametersFactory,
    )
    {
    }

    public function create(ParametersBag $bag): ViewDTO
    {
        $columnsDetails = collect($this->createColumns());

        $parameters = $this->parametersFactory->createParameters($bag, $columnsDetails);
        $listing = $this->queryFactory->createListing();

        $model = $this->useModel()->newQuery();
        $listing->getCompletedData($parameters, $model);

        return new ViewDTO(
            dataQuery: $model,
            viewFlags: $this->columnDetailsByFlags($columnsDetails),
        );
    }

    private function columnDetailsByFlags(Collection $columnDetails): Collection
    {
        $flags = array_keys($columnDetails->first());

        return collect($flags)->mapWithKeys(function ($key) use ($columnDetails) {
            $filteredColumns = $columnDetails->filter(function ($item) use ($key) {
                return $item[$key] === true;
            });
            return [$key => $filteredColumns->keys()->toArray()];
        });
    }
}
