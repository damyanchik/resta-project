<?php

declare(strict_types=1);

namespace App\Modules\Listing\Query\Factory\EloquentQueryFactory;

use App\Modules\Listing\Parameter\DTO\ParametersDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface QueryFactoryInterface
{
    public function createQueryByParametersAndModel(ParametersDTO $parametersDTO, Model $model): LengthAwarePaginator;
}
