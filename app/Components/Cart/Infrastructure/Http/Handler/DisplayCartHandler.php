<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Handler;

use App\Components\Cart\Domain\Exception\CartException;
use App\Components\Cart\Infrastructure\Facade\CartApplicationFacade;
use App\Components\Cart\Infrastructure\Factory\ViewModel\CartViewModelFactory;
use Illuminate\Http\JsonResponse;

class DisplayCartHandler
{
    public function __construct(
        private readonly JsonResponse          $jsonResponse,
        private readonly CartApplicationFacade $facade,
        private readonly CartViewModelFactory  $viewModelFactory,
    )
    {
    }

    /** @throws CartException */
    public function __invoke(): JsonResponse
    {
        return $this->jsonResponse->setData(
            $this->viewModelFactory->createByCartDTO($this->facade->getCart())?->toArray(),
        );
    }
}
