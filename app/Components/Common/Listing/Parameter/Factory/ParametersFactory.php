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
            $this->resolver->resolveSelectedColumns($bag, $columnDetails),
            $this->resolver->resolveSearchColumns($bag, $columnDetails),
            $bag->getSearchTerm(),
            $bag->getOrderDirection(),
            $this->resolver->resolveOrderColumn($bag, $columnDetails),
            $bag->getPerPage(),
        );
    }
}
