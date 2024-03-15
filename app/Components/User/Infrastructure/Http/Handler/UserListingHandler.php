<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Http\Handler;

use App\Components\Common\Listing\Parameter\Request\ParameterRequest;
use App\Components\User\Infrastructure\Facade\UserFacade;
use App\Components\User\Infrastructure\Factories\ViewModel\ListingViewModelFactory;
use Illuminate\Http\JsonResponse;

class UserListingHandler
{
    public function __construct(
        private readonly UserFacade $userFacade,
        private readonly JsonResponse $jsonResponse,
        private readonly ListingViewModelFactory $viewModelFactory,
    )
    {
    }

    public function __invoke(ParameterRequest $request): JsonResponse
    {
        $userListing = $this->userFacade->getUserListing($request);

        return $this->jsonResponse->setData($this->viewModelFactory->createByListingViewDTO($userListing)->toArray());
    }
}
