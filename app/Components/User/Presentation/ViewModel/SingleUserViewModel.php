<?php

declare(strict_types=1);

namespace App\Components\User\Presentation\ViewModel;

class SingleUserViewModel
{
    public function __construct(
        private readonly string $name,
        private readonly string $surname,
        private readonly string $email,
        private readonly int $isActive,
        private readonly string $role,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'isActive' => $this->isActive,
            'role' => $this->role,
        ];
    }
}
