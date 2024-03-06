<?php

declare(strict_types=1);

namespace App\Modules\Listing\Parameter\Enum;

enum QueryOrderEnum: string
{
    case ASC = 'asc';
    case DESC = 'desc';
}
