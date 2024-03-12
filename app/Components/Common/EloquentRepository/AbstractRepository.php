<?php

declare(strict_types=1);

namespace App\Components\Common\EloquentRepository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    public function getAll(array $columns = ['*']): ?Collection
    {
        return $this->model->all($columns);
    }

    public function getByIdOrFail(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function create(EloquentDataBag $data): ?Model
    {
        return $this->model->create($data->toArray());
    }

    public function update(EloquentDataBag $data, int $id): bool
    {
        $model = $this->model->findOrFail($id);

        return $model ? $model->update($data->toArray()) : false;
    }

    public function delete(int $id): bool
    {
        $model = $this->model->findOrFail($id);

        return $model ? $model->delete() : false;
    }
}
