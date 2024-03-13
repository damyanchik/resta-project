<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Factories;

use App\Components\User\Application\DTO\UserCreatable;
use App\Components\User\Application\DTO\UserUpdatable;
use App\Components\User\Domain\DTO\UserCreatableDTO;
use App\Components\User\Domain\DTO\UserUpdatableDTO;

class UserFormationDTOFactory
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
}
