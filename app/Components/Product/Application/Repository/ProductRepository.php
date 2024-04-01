<?php

declare(strict_types=1);

namespace App\Components\Product\Application\Repository;

use App\Components\Common\EloquentRepository\EloquentDataBag;
use Illuminate\Support\Collection;

interface ProductRepository
{
    public function getByUuidOrFail(string $uuid, array $columns = ['*']);
    public function create(EloquentDataBag $data): bool;
    public function update(EloquentDataBag $data, string $uuid): bool;
    public function delete(string $uuid): bool;
    public function getByUuids(array $uuids, array $columns = ['*']): Collection;
}
