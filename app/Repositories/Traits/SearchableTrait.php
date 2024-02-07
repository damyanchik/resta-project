<?php

declare(strict_types=1);

namespace App\Repositories\Traits;

use App\DTOs\IndexDTO;
use Illuminate\Pagination\LengthAwarePaginator;

trait SearchableTrait
{
    public function searchAndSort(IndexDTO $indexDTO, ?callable $whereCallback = null): LengthAwarePaginator
    {
        $query = $this->model->search($indexDTO->getSearch())
            ->sortBy($indexDTO->getColumn(), $indexDTO->getOrder());

        if (!empty($whereCallback)) {
            $query->where($whereCallback);
        }

        return $query->paginate($indexDTO->getDisplay());
    }
}
