<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Traits\IndexHandling;

class CategoryRepository implements CategoryRepositoryInterface
{
    use IndexHandling;

    public function __construct(private Category $model)
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

    public function create(array $data): ?Category
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
