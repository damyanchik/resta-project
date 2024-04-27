<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Http\Handler;

use App\Components\Product\Infrastructure\Facade\ProductFacade;
use App\Components\Product\Infrastructure\Factory\ViewModel\ProductViewModelFactory;
use Illuminate\Http\JsonResponse;

class ShowProductHandler
{
    public function __construct(
        private readonly JsonResponse            $jsonResponse,
        private readonly ProductFacade           $productFacade,
        private readonly ProductViewModelFactory $viewModelFactory,
    )
    {
    }

    public function __invoke(string $uuid): JsonResponse
    {
        return $this->jsonResponse->setData([$this->viewModelFactory->createByProductDTO(
            productDTO: $this->productFacade->getProductByUuid($uuid)
        )]);
    }
}
