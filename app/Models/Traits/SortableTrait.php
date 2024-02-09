<?php

declare(strict_types=1);

namespace App\Models\Traits;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

trait SortableTrait
{
    public function scopeSortBy(Builder $query, string $column, string $direction): Builder
    {
        $defaultColumn = 'id';

        if (!Schema::hasColumn($this->table, $column)) {
            return $query->orderBy($defaultColumn, $direction);
        }

        return $query->orderBy($column, $direction);
    }
}
