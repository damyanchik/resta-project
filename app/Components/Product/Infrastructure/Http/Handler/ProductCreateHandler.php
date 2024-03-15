<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Http\Handler;

use App\Components\Product\Infrastructure\Facade\ProductFacade;
use App\Components\Product\Infrastructure\Http\Request\CreateProductRequest;
use Illuminate\Http\JsonResponse;

class ProductCreateHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly ProductFacade $productFacade,
    )
    {
    }

    public function __invoke(CreateProductRequest $productRequest): JsonResponse
    {
        try {
            $this->productFacade->createProduct($productRequest);
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
