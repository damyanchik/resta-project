<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Handler;

use App\Components\Order\Infrastructure\Facade\OrderFacade;
use App\Components\Order\Infrastructure\Http\Request\PreviewOrderRequest;
use Illuminate\Http\JsonResponse;

class PreviewOrderHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly OrderFacade $orderFacade,
    )
    {
    }

    public function __invoke(PreviewOrderRequest $request): JsonResponse
    {
        $orderDTO = $this->orderFacade->getByPreviewableValues($request);


    }
}
