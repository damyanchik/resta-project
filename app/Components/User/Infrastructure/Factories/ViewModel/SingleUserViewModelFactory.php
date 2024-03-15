<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Factories\ViewModel;

use App\Components\User\Domain\DTO\UserDTO;
use App\Components\User\Presentation\ViewModel\SingleUserViewModel;

class SingleUserViewModelFactory
{
    public function createByUserDTO(UserDTO $user): SingleUserViewModel
    {
        return new SingleUserViewModel(
            name: $user->name,
            surname: $user->surname,
            email: $user->email,
            isActive: $user->isActive,
            role: $user->role,
        );
    }
}
