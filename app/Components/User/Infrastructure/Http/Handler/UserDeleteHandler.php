<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\User\Infrastructure\Facade\UserFacade;
use Illuminate\Http\JsonResponse;

class UserDeleteHandler
{
    public function __construct(
        private readonly UserFacade $userFacade,
        private readonly JsonResponse $jsonResponse,
    )
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        try {
            $this->userFacade->deleteUser($id);
        } catch (\Exception) {
            return $this->jsonResponse->setData(['status' => 'failed']);
        }

        return $this->jsonResponse->setData([
            'status' => 'success',
            'message' => 'User successfully deleted.',
        ]);
    }
}
