<?php

declare(strict_types=1);

namespace App\Components\Common\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    public function getAll()
    {
        return $this->model->all();
    }

    public function getByIdOrFail(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): ?Model
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $model = $this->model->findOrFail($id);

        return $model ? $model->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $model = $this->model->findOrFail($id);

        return $model->delete();
    }
}
