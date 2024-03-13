<?php

declare(strict_types=1);

namespace App\Components\User\Application\DTO;

interface UserToggable
{
    public function isActive(): int;
}
