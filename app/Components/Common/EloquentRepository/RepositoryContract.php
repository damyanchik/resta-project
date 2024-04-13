<?php

declare(strict_types=1);

namespace App\Components\Common\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepositoryContract
{
    public function getByUuidOrFail(string $uuid, array $columns = ['*']): ?Model;
    public function create(EloquentDataBag $data): bool;
    public function update(EloquentDataBag $data, string $uuid): bool;
    public function delete(string $uuid): bool;
    public function getByUuids(array $uuids, array $columns = ['*']): Collection;
}
