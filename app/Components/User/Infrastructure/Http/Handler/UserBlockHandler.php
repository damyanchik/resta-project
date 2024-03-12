<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\User\Infrastructure\Http\Request\PatchBlockUserRequest;
use App\Components\User\Infrastructure\Service\UserService;
use Illuminate\Http\JsonResponse;

class UserBlockHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
    )
    {
    }

    public function __invoke(int $id, PatchBlockUserRequest $userRequest): JsonResponse
    {
        try {
            //todo: block
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
