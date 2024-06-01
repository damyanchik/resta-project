<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\View\Resolver;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentModelResolver
{
    private static LengthAwarePaginator $model;

    private function __construct()
    {
    }

    public static function setModel(LengthAwarePaginator $model): self
    {
        self::$model = $model;

        return new static;
    }

    public function resolveItems(): array
    {
        return array_map(static fn(object $item) => $item->toArray(), self::$model->items());
    }
}
