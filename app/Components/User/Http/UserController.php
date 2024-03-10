<?php

declare(strict_types=1);

namespace App\Components\User\Http;

use App\Components\Common\Listing\Parameter\Request\ParameterRequest;
use App\Components\User\Infrastructure\Listing\UserListing;

class UserController
{
    public function __construct(private readonly UserListing $userListing)
    {
    }

    public function index(ParameterRequest $bag)
    {
        dd($this->userListing->create($bag));

        return $this->userRepository->getAll();
    }

//    public function create(): View
//    {
//        return view('admin.user.create');
//    }
//
//    public function store(StoreUserRequest $storeUserRequest): RedirectResponse
//    {
//        try {
//            $this->userRepository->create($storeUserRequest->validated());
//        } catch (\Exception) {
//            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
//        }
//
//        return redirect()->route('admin.user.index')->with('message', 'Record successfully created');
//    }
//
//    public function edit(int $id): View
//    {
//        return view('admin.user.edit', [
//            'user' => $this->userRepository->getById($id)
//        ]);
//    }
//
//    public function update(UpdateUserRequest $updateUserRequest, int $id): RedirectResponse
//    {
//        try {
//            $this->userRepository->update($id, $updateUserRequest->validated());
//        } catch (\Exception) {
//            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
//        }
//
//        return back()->with('message', 'Record successfully updated');
//    }
//
//    public function destroy(int $id): RedirectResponse
//    {
//        try {
//            $this->userRepository->delete($id);
//        } catch (\Exception) {
//            return back()->with('message', 'An error occurred while processing the data. Please try again later.');
//        }
//
//        return redirect()->route('admin.user.index')->with('message', 'Record successfully deleted');
//    }
}
