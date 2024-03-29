<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\User\Infrastructure\Facade\UserFacade;
use App\Components\User\Infrastructure\Factory\ViewModel\UserViewModelFactory;
use Illuminate\Http\JsonResponse;

class UserShowHandler
{
    public function __construct(
        private readonly UserFacade           $userFacade,
        private readonly JsonResponse         $jsonResponse,
        private readonly UserViewModelFactory $userViewModelFactory,
    )
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        $userDTO = $this->userFacade->getSingleUser($id);

        return $this->jsonResponse->setData($this->userViewModelFactory->createByUserDTO($userDTO)->toArray());
    }
}
