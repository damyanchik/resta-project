<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\User\Infrastructure\Facade\UserFacade;
use App\Components\User\Infrastructure\Http\Request\UpdateUserRequest;
use App\Components\User\Infrastructure\Service\UserService;
use Illuminate\Http\JsonResponse;

class UserUpdateHandler
{
    public function __construct(
        private readonly UserFacade $userFacade,
        private readonly JsonResponse $jsonResponse,
    )
    {
    }

    public function __invoke(int $id, UpdateUserRequest $userRequest): JsonResponse
    {
        try {
            $this->userFacade->updateUser($userRequest, $id);
        } catch (\Exception) {
            return $this->jsonResponse->setData(['status' => 'failed']);
        }

        return $this->jsonResponse->setData([
            'status' => 'success',
            'message' => 'User successfully updated.',
        ]);
    }
}
