<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Handler;

use App\Components\Order\Infrastructure\Facade\OrderFacade;
use App\Components\Order\Infrastructure\Http\Request\OrderExtendedRequest;
use Illuminate\Http\JsonResponse;
use Throwable;

class CreateExtendedOrderHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly OrderFacade $orderFacade,
    )
    {
    }

    /** @throws Throwable */
    public function __invoke(OrderExtendedRequest $orderRequest): JsonResponse
    {
        $this->orderFacade->createByFormable($orderRequest);

        return $this->jsonResponse->setData(['test' => 'test']);
    }
}
