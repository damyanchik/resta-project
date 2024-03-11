<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\User\Infrastructure\Service\UserService;
use Illuminate\Http\JsonResponse;

class UserDeleteHandler
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        try {
            $this->userService->destroyById($id);
        } catch (\Exception) {
            return response()->json(['status' => 'failed']);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'User successfully deleted.',
        ]);
    }
}
