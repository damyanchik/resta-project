<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Http\Handler;

use App\Components\Product\Infrastructure\Facade\ProductFacade;
use Illuminate\Http\JsonResponse;

class DeleteProductHandler
{
    public function __construct(
        private readonly JsonResponse  $jsonResponse,
        private readonly ProductFacade $productFacade,
    )
    {
    }

    public function __invoke(string $uuid): JsonResponse
    {
        return $this->productFacade->deleteByUuid($uuid)
            ? $this->jsonResponse->setData([
                'status' => 'success',
                'message' => 'Product successfully deleted.'])
            : $this->jsonResponse->setData([
                'status' => 'failure',
                'message' => 'Product not deleted.']);
    }
}
