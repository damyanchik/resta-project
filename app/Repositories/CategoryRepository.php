<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Traits\IndexHandling;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    use IndexHandling;

    public function __construct(protected Category $model)
    {
    }
}
