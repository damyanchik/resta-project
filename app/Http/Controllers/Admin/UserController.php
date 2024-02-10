<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\RedirectResponse;
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

    public function store(StoreUserRequest $storeUserRequest): RedirectResponse
    {
        try {
            $this->userRepository->create($storeUserRequest->validated());
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return redirect()->route('admin.user.index')->with('message', 'Record successfully created');
    }

    public function edit(int $id): View
    {
        return view('admin.user.edit', [
            'user' => $this->userRepository->getById($id)
        ]);
    }

    public function update(UpdateUserRequest $updateUserRequest, int $id): RedirectResponse
    {
        try {
            $this->userRepository->update($id, $updateUserRequest->validated());
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return back()->with('message', 'Record successfully updated');
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->userRepository->delete($id);
        } catch (\Exception) {
            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
        }

        return redirect()->route('admin.user.index')->with('message', 'Record successfully deleted');
    }
}
