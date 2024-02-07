<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Traits\SearchableTrait;

class ProductRepository implements ProductRepositoryInterface
{
    use SearchableTrait;

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
        return $this->model->updateOrFail($data);
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
