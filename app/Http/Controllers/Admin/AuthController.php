<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuthRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function index(): View
    {
        return view('admin.auth.index');
    }

    public function login(LoginAuthRequest $authRequest): RedirectResponse
    {
        if (!auth()->attempt($authRequest->validated())) {
            return back()
                ->withErrors(['email' => 'Incorrect email or password.'])
                ->onlyInput('email');
        }

        $this->authService->logout($authRequest->session());

        return redirect()
            ->route('admin.dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        $this->authService->logout($request->session());

        return redirect()
            ->route('admin.auth.index')
            ->with('message', 'User is logout.');
    }
}
