<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\DTOs\IndexDTO;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    public function getAll();
    public function getById(int $id);
    public function delete(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function paginateSearchAndSort(IndexDTO $indexDTO): LengthAwarePaginator;
}
