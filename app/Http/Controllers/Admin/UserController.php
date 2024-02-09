<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function index(IndexRequest $request): View
    {
        return view('admin.user.index', [
            'users' => $this->userRepository->getDataForIndex($request->data())
        ]);
    }

    public function create(): View
    {
        return view('admin.user.create');
    }

    public function store()
    {

    }

    public function edit(int $id): View
    {
        return view('admin.user.edit', [
            'user' => $this->userRepository->getById($id)
        ]);
    }

    public function update()
    {

    }
}
