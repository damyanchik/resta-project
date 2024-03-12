<?php

declare(strict_types=1);

namespace App\Components\User\Domain\DTO;

use App\Components\Common\EloquentRepository\EloquentDataBag;

class UserDTO implements EloquentDataBag
{
    public function __construct(
        public readonly string $name,
        public readonly string $surname,
        public readonly string $password,
        public readonly string $email,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'password' => $this->password,
            'email' => $this->email,
        ];
    }
}
