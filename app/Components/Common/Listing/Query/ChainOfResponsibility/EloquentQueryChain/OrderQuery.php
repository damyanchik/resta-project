<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\Query\ChainOfResponsibility\EloquentQueryChain;

use App\Components\Common\Listing\Parameter\DTO\ParametersDTO;
use Illuminate\Database\Eloquent\Builder;

class OrderQuery extends AbstractChain
{
    public function build(ParametersDTO $parametersDTO, Builder $builder): AbstractChain
    {
        $builder->orderBy($parametersDTO->orderColumn, $parametersDTO->orderDirection->value);

        return parent::build($parametersDTO, $builder);
    }
}
