<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Http\Handler;

use App\Components\Shopcart\Infrastructure\Facade\ShopcartFacade;
use Illuminate\Http\JsonResponse;

class RemoveShopcartHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly ShopcartFacade $facade,
    )
    {
    }

    public function __invoke(string $uuid): JsonResponse
    {
        $this->facade->removeFromCart($uuid);

        return $this->jsonResponse->setData(['success']);
    }
}
