<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Factory;

use App\Components\User\Application\DTO\UserCreatable;
use App\Components\User\Application\DTO\UserUpdatable;
use App\Components\User\Domain\DTO\UserCreatableDTO;
use App\Components\User\Domain\DTO\UserDTO;
use App\Components\User\Domain\DTO\UserUpdatableDTO;
use App\Components\User\Domain\Model\User;

class UserDTOFactory
{
    public function createForCreate(UserCreatable $creatable): UserCreatableDTO
    {
        return new UserCreatableDTO(
            name: $creatable->userName(),
            surname: $creatable->userSurname(),
            email: $creatable->userEmail(),
            password: $creatable->userPassword(),
        );
    }

    public function createForUpdate(UserUpdatable $updatable): UserUpdatableDTO
    {
        return new UserUpdatableDTO(
            name: $updatable->userName(),
            surname: $updatable->userSurname(),
            email: $updatable->userEmail(),
        );
    }

    public function createForFetched(User $user): UserDTO
    {
        return new UserDTO(
            name: $user->name,
            surname: $user->surname,
            email: $user->email,
            role: $user->role,
            isActive: $user->is_active,
        );
    }
}
