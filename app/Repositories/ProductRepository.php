<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Traits\IndexHandling;

class ProductRepository implements ProductRepositoryInterface
{
    use IndexHandling;

    public function __construct(private Product $model)
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

    public function create(array $data): ?Product
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
