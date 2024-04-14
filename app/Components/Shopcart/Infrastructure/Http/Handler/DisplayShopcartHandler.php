<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Http\Handler;

use App\Components\Shopcart\Infrastructure\Facade\ShopcartFacade;
use App\Components\Shopcart\Infrastructure\Factory\ViewModel\ShopcartViewModelFactory;
use Illuminate\Http\JsonResponse;

class DisplayShopcartHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly ShopcartFacade $facade,
        private readonly ShopcartViewModelFactory $viewModelFactory,
    )
    {
    }

    public function __invoke(): JsonResponse
    {

        return $this->jsonResponse->setData(
            data: $this->viewModelFactory->createByShopcartDTO($this->facade->displayAllCart())->toArray(),
        );
    }
}
