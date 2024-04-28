<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Handler;

use App\Components\Cart\Infrastructure\Facade\CartApplicationFacade;
use Illuminate\Http\JsonResponse;

class RemoveItemCartHandler
{
    public function __construct(
        private readonly JsonResponse          $jsonResponse,
        private readonly CartApplicationFacade $facade,
    )
    {
    }

    public function __invoke(string $uuid): JsonResponse
    {
        return $this->facade->removeItemFromCart($uuid)
            ? $this->jsonResponse->setData(['success'])
            : $this->jsonResponse->setData(['failure']);
    }
}
