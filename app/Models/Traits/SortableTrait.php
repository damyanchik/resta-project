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

        if ($this->hasColumn($column)) {
            return $query->orderBy($defaultColumn, $direction);
        }

        return $query->orderBy($column, $direction);
    }

    private function hasColumn(string $column): bool
    {
        return !Schema::hasColumn($this->table, $column);
    }
}
