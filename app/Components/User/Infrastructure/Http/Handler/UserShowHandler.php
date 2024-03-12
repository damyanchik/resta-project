<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\User\Infrastructure\Facade\UserFacade;
use Illuminate\Http\JsonResponse;

class UserShowHandler
{
    public function __construct(
        private readonly UserFacade $userFacade,
        private readonly JsonResponse $jsonResponse,
    )
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        return $this->jsonResponse->setData($this->userFacade->getSingleUser($id)->toArray());
    }
}
