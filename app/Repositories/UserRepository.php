<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Traits\IndexHandling;

class UserRepository implements UserRepositoryInterface
{
    use IndexHandling;

    public function __construct(private User $model)
    {
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->query()->findOrFail($id);
    }

    public function create(array $data): ?User
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $model = $this->model->findOrFail($id);

        return $model->update($data);
    }

    public function delete(int $id)
    {
        $model = $this->model->findOrFail($id);

        return $model->destroy();
    }
}
