<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Handler;

use App\Components\Order\Domain\Exception\OrderItemException;
use App\Components\Order\Infrastructure\Facade\OrderFacade;
use App\Components\Order\Infrastructure\Factory\ViewModel\OrderViewModelFactory;
use App\Components\Order\Infrastructure\Http\Request\OrderRequest;
use Illuminate\Http\JsonResponse;

class PreviewOrderHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly OrderFacade $orderFacade,
        private readonly OrderViewModelFactory $viewModelFactory,
    )
    {
    }

    /**
     * @throws OrderItemException
     */
    public function __invoke(OrderRequest $request): JsonResponse
    {
        $orderDTO = $this->orderFacade->getPreviewByFormable($request);

        return $this->jsonResponse->setData(
            $this->viewModelFactory->createOrderViewModelByOrderDTO($orderDTO)->toArray()
        );
    }
}
