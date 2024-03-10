<?php

namespace App\Components\Common\Listing\Parameter\Resolver;

use App\Components\Common\Listing\Parameter\Request\ParametersBag;
use Illuminate\Support\Collection;

class ParametersResolver
{
    public function resolveSelectedColumns(ParametersBag $bag, Collection $columns): array
    {
        return $columns
            ->filter(function ($item, $key) use ($bag) {
            return
                !$item['isRemoval'] ||
                $item['isVisible'] ||
                in_array($key, $bag->getSelectedColumns());
            })
            ->keys()
            ->toArray();
    }

    public function resolveSearchColumns(ParametersBag $bag, Collection $columns): array
    {
        $searchableColumns = $columns->where('isSearchable', '==', true)
            ->keys()
            ->intersect($bag->getSearchColumns());

        if ($searchableColumns->isEmpty()) {
            $searchableColumns = $columns->where('isSearchable', '==', true)->keys();
        }

        return $searchableColumns->toArray();
    }

    public function resolveOrderColumn(ParametersBag $bag, Collection $columns): string
    {
        if (
            ! $columns->keys()->contains($bag->getOrderColumn()) ||
            ! $columns[$bag->getOrderColumn()]['isSortable']
        ) {
            return $columns->keys()->first();
        }

        return $bag->getOrderColumn();
    }
}
