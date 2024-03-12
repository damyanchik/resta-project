<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\User\Infrastructure\Http\Request\StoreUserRequest;
use App\Components\User\Infrastructure\Service\UserService;
use Illuminate\Http\JsonResponse;

class UserStoreHandler
{
    public function __construct(
        private readonly UserService $userService,
        private readonly JsonResponse $jsonResponse,
    )
    {
    }

    public function __invoke(StoreUserRequest $userRequest): JsonResponse
    {
        try {
            $this->userService->create($userRequest->validated());
        } catch (\Exception) {
            return $this->jsonResponse->setData([
                'status' => 'failed',
                'message' => 'User not created.'
            ]);
        }

        return $this->jsonResponse->setData([
            'status' => 'success',
            'message' => 'User successfully created.'
        ]);
    }
}
