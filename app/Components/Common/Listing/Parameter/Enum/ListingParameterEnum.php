<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\Parameter\Enum;

enum ListingParameterEnum: string
{
    case IS_REMOVAL = 'isRemoval';
    case IS_VISIBLE = 'isVisible';
    case IS_SEARCHABLE = 'isSearchable';
    case IS_SORTABLE = 'isSortable';
    case IS_FILTERABLE = 'isFilterable';
    case IS_RANGEABLE = 'isRangeable';
}
