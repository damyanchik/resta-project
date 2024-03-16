<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Factories\ViewModel;

use App\Components\User\Domain\DTO\UserDTO;
use App\Components\User\Presentation\ViewModel\UserViewModel;

class UserViewModelFactory
{
    public function createByUserDTO(UserDTO $user): UserViewModel
    {
        return new UserViewModel(
            name: $user->name,
            surname: $user->surname,
            email: $user->email,
            isActive: $user->isActive,
            role: $user->role,
        );
    }
}
