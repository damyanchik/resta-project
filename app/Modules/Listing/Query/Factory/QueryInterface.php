<?php

declare(strict_types=1);

namespace App\Modules\Listing\Query\Factory;

use App\Modules\Listing\Parameter\DTO\ParametersDTO;
use Illuminate\Database\Eloquent\Builder;

interface QueryInterface
{
    public function getCompletedData(ParametersDTO $parametersDTO, Builder $builder): void;
}
