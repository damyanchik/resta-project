<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Repository;

use App\Components\Common\EloquentRepository\AbstractRepository;
use App\Models\User;

class UserRepository extends AbstractRepository
{
    public function __construct(protected readonly User $model)
    {
    }
}
