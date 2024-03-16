<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Http\Handler;

use App\Components\Product\Infrastructure\Facade\ProductFacade;
use Illuminate\Http\JsonResponse;

class ProductDeleteHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly ProductFacade $productFacade,
    )
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        try {
            $this->productFacade->deleteUser($id);
        } catch (\Exception) {
            return $this->jsonResponse->setData(['status' => 'failed']);
        }

        return $this->jsonResponse->setData([
            'status' => 'success',
            'message' => 'Product successfully deleted.',
        ]);
    }
}
