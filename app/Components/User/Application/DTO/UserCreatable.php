<?php

declare(strict_types=1);

namespace App\Components\User\Application\DTO;

interface UserCreatable
{
    public function userName(): string;
    public function userSurname(): string;
    public function userEmail(): string;
    public function userPassword(): string;
}
