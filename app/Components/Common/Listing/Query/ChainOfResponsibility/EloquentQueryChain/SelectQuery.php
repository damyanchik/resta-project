<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\Query\ChainOfResponsibility\EloquentQueryChain;

use App\Components\Common\Listing\Parameter\DTO\ParametersDTO;
use Illuminate\Database\Eloquent\Builder;


class SelectQuery extends AbstractChain
{
    public function build(ParametersDTO $parametersDTO, Builder $builder): AbstractChain
    {
        $builder->select($parametersDTO->selectedColumns);

        return parent::build($parametersDTO, $builder);
    }
}
