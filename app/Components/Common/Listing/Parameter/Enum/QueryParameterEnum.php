<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\Parameter\Enum;

enum QueryParameterEnum: string
{
    case SELECT_COLUMN = 'select';
    case SEARCH_IN_COLUMN = 'in';
    case SEARCH_TERM = 'term';
    case ORDER_BY = 'by';
    case ORDER_BY_DIRECTION = 'direct';
    case PER_PAGE = 'per';
}
