<?php

declare(strict_types=1);

namespace App\Modules\Listing\Parameter\DTO;

use App\Modules\Listing\Parameter\Enum\QueryOrderEnum;

class ParametersDTO
{
    public function __construct(
        readonly public array          $selectedColumns,
        readonly public array          $searchColumns,
        readonly public string         $searchTerm,
        readonly public QueryOrderEnum $orderDirection,
        readonly public string         $orderColumn,
        readonly public int            $perPage,
    )
    {
    }
}
