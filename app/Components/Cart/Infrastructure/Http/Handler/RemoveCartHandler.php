<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Handler;

use App\Components\Cart\Infrastructure\Facade\CartFacade;
use Illuminate\Http\JsonResponse;

class RemoveCartHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly CartFacade   $facade,
    )
    {
    }

    public function __invoke(string $uuid): JsonResponse
    {
        $this->facade->removeItemFromCart($uuid);

        return $this->jsonResponse->setData(['success']);
    }
}
