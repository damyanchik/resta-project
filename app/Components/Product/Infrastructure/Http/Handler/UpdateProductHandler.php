<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Http\Handler;

use App\Components\Product\Infrastructure\Facade\ProductFacade;
use App\Components\Product\Infrastructure\Http\Request\ProductRequest;
use Illuminate\Http\JsonResponse;

class UpdateProductHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly ProductFacade $productFacade,
    )
    {
    }

    public function __invoke(ProductRequest $productRequest, string $uuid): JsonResponse
    {
        $this->productFacade->updateByFormable($productRequest, $uuid);

        return $this->jsonResponse->setData([
            'status' => 'success',
            'message' => 'Product successfully created.'
        ]);
    }
}
