<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\User\Infrastructure\Service\UserService;
use Illuminate\Http\JsonResponse;

class UserShowHandler
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        return response()->json($this->userService->getById($id));
    }
}
