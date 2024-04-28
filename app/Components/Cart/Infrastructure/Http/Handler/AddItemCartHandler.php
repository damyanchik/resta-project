<?php

declare(strict_types=1);

namespace App\Components\Cart\Infrastructure\Http\Handler;

use App\Components\Cart\Infrastructure\Facade\CartApplicationFacade;
use App\Components\Cart\Infrastructure\Http\Request\CartRequest;
use Illuminate\Http\JsonResponse;

class AddItemCartHandler
{
    public function __construct(
        private readonly JsonResponse          $jsonResponse,
        private readonly CartApplicationFacade $facade,
    )
    {
    }

    public function __invoke(string $uuid, CartRequest $request): JsonResponse
    {
        $this->facade->addItemToCart($uuid, $request);

        //przekazanie expct
        return $this->jsonResponse->setData(['success?']);
    }
}
