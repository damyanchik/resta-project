<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Http\Handler;

use App\Components\Product\Infrastructure\Facade\ProductFacade;
use App\Components\Product\Infrastructure\Factory\ViewModel\ProductViewModelFactory;
use Illuminate\Http\JsonResponse;

class ProductShowHandler
{
    public function __construct(
        private readonly ProductFacade $productFacade,
        private readonly JsonResponse $jsonResponse,
        private readonly ProductViewModelFactory $viewModelFactory,
    )
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        $productDto = $this->productFacade->getSingleProduct($id);

        return $this->jsonResponse->setData([$this->viewModelFactory->createByProductDTO($productDto)]);
    }
}
