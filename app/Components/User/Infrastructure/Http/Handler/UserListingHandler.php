<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\Common\Listing\Parameter\Request\ParameterRequest;
use App\Components\User\Infrastructure\Service\UserService;
use Illuminate\Http\JsonResponse;

class UserListingHandler
{
    public function __construct(
        private readonly UserService $userService,
        private readonly JsonResponse $jsonResponse,
    )
    {
    }

    public function __invoke(ParameterRequest $request): JsonResponse
    {
        return $this->jsonResponse->setData($this->userService->getUserListingData($request));
    }
}
