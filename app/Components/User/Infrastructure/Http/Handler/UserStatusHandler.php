<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\User\Infrastructure\Facade\UserFacade;
use App\Components\User\Infrastructure\Http\Request\PatchUserStatusRequest;
use Illuminate\Http\JsonResponse;

class UserStatusHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly UserFacade $userFacade,
    )
    {
    }

    public function __invoke(PatchUserStatusRequest $userRequest, int $id): JsonResponse
    {
        try {
            $this->userFacade->toggleUserStatus($userRequest, $id);
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
