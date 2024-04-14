<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Http\Handler;

use App\Components\Shopcart\Infrastructure\Facade\ShopcartFacade;
use App\Components\Shopcart\Infrastructure\Http\Request\ShopcartRequest;
use Illuminate\Http\JsonResponse;

class AddShopcartHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly ShopcartFacade $facade,
    )
    {
    }

    public function __invoke(string $uuid, ShopcartRequest $request): JsonResponse
    {
        $this->facade->addToCart($uuid, $request);

        return $this->jsonResponse->setData(['success'], );
    }
}
