<?php

declare(strict_types=1);

namespace App\Components\User\Domain\DTO;

class UserDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $surname,
        public readonly string $email,
        public readonly string $role,
        public readonly int $isActive,
    )
    {
    }
}
