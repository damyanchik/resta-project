<?php

declare(strict_types=1);

namespace App\Components\Common\EloquentRepository;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    public function getByIdOrFail(int $id, array $columns = ['*']): ?Model
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function create(EloquentDataBag $data): bool
    {
        return $this->model->create($data->toArray());
    }

    public function update(EloquentDataBag $data, int $id): bool
    {
        $model = $this->model->findOrFail($id);

        if ($model === null) {
            return false;
        }

        return $model->update($data->toArray());
    }

    public function delete(int $id): bool
    {
        $model = $this->model->findOrFail($id);

        if ($model === null) {
            return false;
        }

        return $model->delete();
    }
}
