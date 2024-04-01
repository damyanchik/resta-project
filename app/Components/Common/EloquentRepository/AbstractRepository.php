<?php

declare(strict_types=1);

namespace App\Components\Common\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class AbstractRepository
{
    public function getByUuidOrFail(string $uuid, array $columns = ['*']): ?Model
    {
        return $this->model->findOrFail($uuid, $columns);
    }

    public function create(EloquentDataBag $data): bool
    {
        return (bool)$this->model->create($data->toArray());
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
}
