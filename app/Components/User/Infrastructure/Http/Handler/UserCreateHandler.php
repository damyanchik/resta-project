<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\User\Infrastructure\Facade\UserFacade;
use App\Components\User\Infrastructure\Http\Request\CreateUserRequest;
use Illuminate\Http\JsonResponse;

class UserCreateHandler
{
    public function __construct(
        private readonly UserFacade $userFacade,
        private readonly JsonResponse $jsonResponse,
    )
    {
    }

    public function __invoke(CreateUserRequest $userRequest): JsonResponse
    {
        try {
            $this->userFacade->createByCreatableValues($userRequest);
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
