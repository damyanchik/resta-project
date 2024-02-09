<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Contracts\Session\Session;

class AuthService
{
    public function login(Session $session): void
    {
        $session->regenerate();
    }

    public function logout(Session $session): void
    {
        auth()->logout();

        $session->invalidate();
        $session->regenerateToken();
    }
}
