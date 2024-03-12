<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Factories;

use App\Components\User\Application\DTO\UserCreatable;
use App\Components\User\Application\DTO\UserUpdatable;
use App\Components\User\Domain\DTO\UserDTO;

class UserDTOFactory
{
    public function createForCreate(UserCreatable $creatable): UserDTO
    {
        return new UserDTO(
            name: $creatable->userName(),
            surname: $creatable->userSurname(),
            password: $creatable->userPassword(),
            email: $creatable->userEmail(),
        );
    }

    public function createForUpdate(UserUpdatable $updatable): UserDTO
    {
        return new UserDTO(
            name: $updatable->userName(),
            surname: $updatable->userSurname(),
            password: $updatable->userPassword(),
            email: $updatable->userEmail(),
        );
    }
}
