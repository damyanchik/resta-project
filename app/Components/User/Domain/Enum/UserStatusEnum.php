<?php

declare(strict_types=1);

namespace App\Components\User\Domain\Enum;

enum UserStatusEnum: int
{
    case Inactive = 0;
    case Active = 1;
}
