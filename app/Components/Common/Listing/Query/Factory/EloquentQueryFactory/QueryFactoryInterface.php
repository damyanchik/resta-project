<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\Query\Factory\EloquentQueryFactory;

use App\Components\Common\Listing\Parameter\DTO\ParametersDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface QueryFactoryInterface
{
    public function createQueryByParametersAndModel(ParametersDTO $parametersDTO, Model $model): LengthAwarePaginator;
}
