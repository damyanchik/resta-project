<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Handler;

use App\Components\Cart\Infrastructure\Facade\CartFacade;
use App\Components\Cart\Infrastructure\Factory\ViewModel\CartViewModelFactory;
use Illuminate\Http\JsonResponse;

class DisplayCartHandler
{
    public function __construct(
        private readonly JsonResponse         $jsonResponse,
        private readonly CartFacade           $facade,
        private readonly CartViewModelFactory $viewModelFactory,
    )
    {
    }

    public function __invoke(): JsonResponse
    {

        return $this->jsonResponse->setData(
            data: $this->viewModelFactory->createByShopcartDTO($this->facade->displayCartItems())->toArray(),
        );
    }
}
