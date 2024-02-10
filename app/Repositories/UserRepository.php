<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Traits\IndexHandling;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    use IndexHandling;

    public function __construct(protected User $model)
    {
    }
}
