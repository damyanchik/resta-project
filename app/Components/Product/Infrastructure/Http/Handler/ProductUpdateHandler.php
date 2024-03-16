<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Http\Handler;

use App\Components\Product\Infrastructure\Facade\ProductFacade;
use App\Components\Product\Infrastructure\Http\Request\UpdateProductRequest;
use Illuminate\Http\JsonResponse;

class ProductUpdateHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly ProductFacade $productFacade,
    )
    {
    }

    public function __invoke(UpdateProductRequest $productRequest, int $id): JsonResponse
    {
        try {
            $this->productFacade->updateProduct($productRequest, $id);
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
