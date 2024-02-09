<?php

declare(strict_types=1);

namespace App\Repositories\Traits;

use App\DTOs\IndexDTO;
use Illuminate\Pagination\LengthAwarePaginator;

trait IndexHandling
{
    public function getDataForIndex(IndexDTO $indexDTO): LengthAwarePaginator
    {
        $query = $this->model
            ->search($indexDTO->getSearch())
            ->sortBy($indexDTO->getColumn(), $indexDTO->getOrder());

        return $query->paginate($indexDTO->getDisplay());
    }
}
