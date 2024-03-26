<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Handler;

use Illuminate\Http\JsonResponse;

class OrderCreateHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
    )
    {
    }

    public function __invoke($orderRequest): JsonResponse
    {
        try {
            //todo: create
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
