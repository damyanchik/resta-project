<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Handler;

use App\Components\Cart\Infrastructure\Facade\CartApplicationFacade;
use Illuminate\Http\JsonResponse;

class DestroyCartHandler
{
    public function __construct(
        private readonly JsonResponse          $jsonResponse,
        private readonly CartApplicationFacade $facade,
    )
    {
    }

    public function __invoke(): JsonResponse
    {
        return $this->facade->destroyCart()
            ? $this->jsonResponse->setData(['success'])
            : $this->jsonResponse->setData(['failure']);
    }
}
