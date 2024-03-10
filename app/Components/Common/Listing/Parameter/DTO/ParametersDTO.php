<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\Parameter\DTO;

use App\Components\Common\Listing\Parameter\Enum\QueryOrderEnum;

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
