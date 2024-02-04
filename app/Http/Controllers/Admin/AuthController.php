<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index(): View
    {
        return View('admin.auth.index');
    }

    public function login(LoginAuthRequest $authRequest): RedirectResponse
    {
        if (!auth()->attempt($authRequest->validated())) {
            return back()
                ->withErrors(['email' => 'Incorrect email or password.'])
                ->onlyInput('email');
        }

        $authRequest->session()->regenerate();

        return redirect()
            ->route('admin.dashboard');
    }

    public function logout(Request $request): void
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
