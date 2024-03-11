<?php

declare(strict_types=1);

namespace App\Components\User\Presentation\ViewModel;

class UserListingViewModel
{
    public function __construct(
        private readonly array $users,
        private readonly array $flags,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'users' => $this->users,
            'flags' => $this->flags,
        ];
    }
}
