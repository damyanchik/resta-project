<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\Parameter\Factory;

use App\Components\Common\Listing\Parameter\DTO\ParametersDTO;
use App\Components\Common\Listing\Parameter\Request\ParametersBag;
use App\Components\Common\Listing\Parameter\Resolver\ParametersResolver;
use Illuminate\Support\Collection;

class ParametersFactory
{
    public function __construct(private readonly ParametersResolver $resolver)
    {
    }

    public function createParameters(ParametersBag $bag, Collection $columnDetails): ParametersDTO
    {
        return new ParametersDTO(
            selectedColumns: $this->resolver->resolveSelectedColumns($bag, $columnDetails),
            searchColumns: $this->resolver->resolveSearchColumns($bag, $columnDetails),
            searchTerm: $bag->getSearchTerm(),
            orderDirection: $bag->getOrderDirection(),
            orderColumn: $this->resolver->resolveOrderColumn($bag, $columnDetails),
            perPage: $bag->getPerPage(),
        );
    }
}
