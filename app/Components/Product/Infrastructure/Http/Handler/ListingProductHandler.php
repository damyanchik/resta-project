<?php

declare(strict_types=1);

namespace App\Components\Product\Infrastructure\Http\Handler;

use App\Components\Common\Listing\Parameter\Request\ParameterRequest;
use App\Components\Product\Presentation\Listing\ProductListing;
use Illuminate\Http\JsonResponse;

class ListingProductHandler
{
    public function __construct(
        private readonly ProductListing $productListing,
        private readonly JsonResponse $jsonResponse,
    )
    {
    }

    public function __invoke(ParameterRequest $request): JsonResponse
    {
        return $this->jsonResponse->setData($this->productListing->create($request)->toArray());
    }
}
