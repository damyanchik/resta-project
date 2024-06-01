<?php

declare(strict_types=1);

namespace App\Components\Common\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

abstract class AbstractRepository
{
    public function findByUuid(string $uuid, array $columns = ['*']): ?Model
    {
        return $this->model->find($uuid, $columns);
    }

    public function create(EloquentDataBag $data): string
    {
        return $this->model->create($data->toArray())->getKey();
    }

    public function insert(array $data): bool
    {
        return (bool) $this->model->insert($data);
    }

    public function update(EloquentDataBag $data, string $uuid): bool
    {
        $model = $this->model->findOrFail($uuid);

        if ($model === null) {
            return false;
        }

        return $model->update($data->toArray());
    }

    public function delete(string $uuid): bool
    {
        $model = $this->model->findOrFail($uuid);

        if ($model === null) {
            return false;
        }

        return $model->delete();
    }

    public function getByUuids(array $uuids, array $columns = ['*']): Collection
    {
        return $this->model
            ->newQuery()
            ->select($columns)
            ->whereIn('uuid', $uuids)
            ->get();
    }

    public function getBy(
        string|int|float|array $needle,
        string $byColumn,
        array $columns = ['*'],
    ): Collection
    {
        return $this->model
            ->newQuery()
            ->select($columns)
            ->whereIn($byColumn, Arr::wrap($needle))
            ->get();
    }
}
