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

    public function index(IndexRequest $request)
    {
        return View('admin.user.index', [
            'users' => $this->userRepository->getDataForIndex($request->data())
        ]);
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
