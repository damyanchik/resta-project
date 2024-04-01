<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Repository;

use App\Components\Common\EloquentRepository\AbstractRepository;
use App\Components\User\Domain\Model\User;

class UserRepository extends AbstractRepository
{
    public function __construct(protected readonly User $model)
    {
    }

    public function toggleStatus(string $uuid, int $status): bool
    {
        $user = $this->getByUuidOrFail($uuid);

        if ($user === null) {
            return false;
        }

        return $user->update(['is_active' => $status]);
    }
}
