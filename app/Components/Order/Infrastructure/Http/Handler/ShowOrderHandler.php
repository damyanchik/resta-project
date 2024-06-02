<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Http\Handler;

use App\Components\Order\Infrastructure\Facade\OrderFacade;
use App\Components\Order\Infrastructure\Factory\ViewModel\OrderViewModelFactory;
use Illuminate\Http\JsonResponse;

class ShowOrderHandler
{
    public function __construct(
        private readonly JsonResponse $jsonResponse,
        private readonly OrderFacade $orderFacade,
        private readonly OrderViewModelFactory $viewModelFactory,
    )
    {
    }

    public function __invoke(string $uuid): JsonResponse
    {
        $order = $this->orderFacade->showOrderByUuid($uuid);

        return $this->jsonResponse->setData([
            $this->viewModelFactory->createOrderViewModelByOrderDTO($order)->toArray()
        ]);
    }
}
