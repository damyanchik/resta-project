<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Facade;

use App\Components\Order\Application\DTO\OrderFormable;
use App\Components\Order\Infrastructure\Factory\OrderDTOFactory;
use App\Components\Order\Infrastructure\Repository\OrderRepository;

class OrderFacade
{
    public function __construct(
        private readonly OrderRepository $orderRepository,
        private readonly OrderDTOFactory $orderDTOFactory,
    )
    {
    }

    public function createByCreatableValues(OrderFormable $orderCreatable): bool
    {
        return $this->orderRepository->create($this->orderDTOFactory->createForFormation($orderCreatable));
    }
}
