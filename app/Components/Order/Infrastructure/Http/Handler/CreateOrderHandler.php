<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Handler;

use App\Components\Order\Infrastructure\Facade\OrderFacade;
use App\Components\Order\Infrastructure\Http\Request\OrderRequest;
use Illuminate\Http\JsonResponse;

class CreateOrderHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly OrderFacade $orderFacade,
    )
    {
    }

    public function __invoke(OrderRequest $orderRequest): JsonResponse
    {
        try {
            $this->orderFacade->createByCreatableValues($orderRequest);
        } catch (\Exception) {
            return $this->jsonResponse->setData([
                'status' => 'failed',
                'message' => 'Product not created.'
            ]);
        }

        return $this->jsonResponse->setData([
            'status' => 'success',
            'message' => 'Product successfully created.'
        ]);
    }
}
