<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Handler;

use App\Components\Order\Application\DTO\OrderFormable;
use App\Components\Order\Infrastructure\Facade\OrderFacade;
use App\Components\Order\Infrastructure\Http\Request\OrderRequest;
use Illuminate\Http\JsonResponse;
use Throwable;

class CreateFromCartOrderHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly OrderFacade $orderFacade,
    )
    {
    }

    /** @throws Throwable */
    public function __invoke(OrderRequest $orderRequest): JsonResponse
    {
        $this->orderFacade->createByFormableAndSelfCartSession($orderRequest);

        return $this->jsonResponse->setData(['test' => 'test']);
    }
}
