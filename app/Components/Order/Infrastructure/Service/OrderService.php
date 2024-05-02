<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Service;

use App\Components\Order\Domain\DTO\OrderFormableDTO;
use App\Components\Order\Domain\DTO\OrderItemFormableDTO;
use App\Components\Order\Infrastructure\Repository\OrderItemRepository;
use App\Components\Order\Infrastructure\Repository\OrderRepository;
use App\Components\Order\Infrastructure\Resolver\OrderResolver;
use Illuminate\Support\Collection;

class OrderService
{
    public function __construct(
        private readonly OrderRepository     $orderRepository,
        private readonly OrderItemRepository $orderItemRepository,
        private readonly OrderResolver       $orderResolver,
    )
    {
    }

    /**
     * @param OrderFormableDTO $orderFormableDTO
     * @param Collection<int, OrderItemFormableDTO> $orderItemFormableDTOs
     * @return bool
     */
    public function store(OrderFormableDTO $orderFormableDTO, Collection $orderItemFormableDTOs): bool
    {
        $orderUuid = $this->orderRepository->create($orderFormableDTO);

        return $this->orderItemRepository->insert(
            $this->orderResolver->resolveUuidAndOrderItemFormableToArray(
                orderUuid: $orderUuid,
                orderItemFormableDTOs: $orderItemFormableDTOs,
            ),
        );
    }
}
