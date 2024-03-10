<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\Query\ChainOfResponsibility\EloquentQueryChain;

use App\Components\Common\Listing\Parameter\DTO\ParametersDTO;
use Illuminate\Database\Eloquent\Builder;


class WhereQuery extends AbstractChain
{
    public function build(ParametersDTO $parametersDTO, Builder $builder): AbstractChain
    {
        if (!empty($parametersDTO->searchTerm)) {
            foreach ($parametersDTO->searchColumns as $index => $searchColumn) {
                if ($index === 0) {
                    $builder->where($searchColumn, 'LIKE', '%' . $parametersDTO->searchTerm . '%');
                    continue;
                }

                $builder->orWhere($searchColumn, 'LIKE', '%' . $parametersDTO->searchTerm . '%');
            }
        }

        return parent::build($parametersDTO, $builder);
    }
}
