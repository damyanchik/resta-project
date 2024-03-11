<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\User\Infrastructure\Http\Request\UpdateUserRequest;
use App\Components\User\Infrastructure\Service\UserService;
use Illuminate\Http\JsonResponse;

class UserUpdateHandler
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function __invoke(int $id, UpdateUserRequest $userRequest): JsonResponse
    {
        try {
            $this->userService->updateById($id, $userRequest->validated());
        } catch (\Exception) {
            return response()->json(['status' => 'failed']);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'User successfully updated.'
        ]);
    }
}
