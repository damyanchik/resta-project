<?php

namespace App\Components\Common\Listing\Parameter\Resolver;

use App\Components\Common\Listing\Parameter\Enum\ListingParameterEnum;
use App\Components\Common\Listing\Parameter\Request\ParametersBag;
use Illuminate\Support\Collection;

class ParametersResolver
{
    public function resolveSelectedColumns(ParametersBag $bag, Collection $columns): array
    {
        return $columns
            ->filter(function ($item, $key) use ($bag) {
            return
                !$item[ListingParameterEnum::IS_REMOVAL->value] ||
                $item[ListingParameterEnum::IS_VISIBLE->value] ||
                in_array($key, $bag->getSelectedColumns());
            })
            ->keys()
            ->toArray();
    }

    public function resolveSearchColumns(ParametersBag $bag, Collection $columns): array
    {
        $searchableColumns = $columns->where(ListingParameterEnum::IS_SEARCHABLE->value, '==', true)
            ->keys()
            ->intersect($bag->getSearchColumns());

        if ($searchableColumns->isEmpty()) {
            $searchableColumns = $columns
                ->where(ListingParameterEnum::IS_SEARCHABLE->value, '==', true)
                ->keys();
        }

        return $searchableColumns->toArray();
    }

    public function resolveOrderColumn(ParametersBag $bag, Collection $columns): string
    {
        if (
            ! $columns->keys()->contains($bag->getOrderColumn()) ||
            ! $columns[$bag->getOrderColumn()][ListingParameterEnum::IS_SORTABLE->value]
        ) {
            return $columns->keys()->first();
        }

        return $bag->getOrderColumn();
    }
}
