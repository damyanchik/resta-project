<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory\ViewModel;

use App\Components\Order\Domain\DTO\OrderDTO;
use App\Components\Order\Presentation\ViewModel\OrderViewModel;

class OrderViewModelFactory
{
    public function __construct(private readonly OrderItemViewModelFactory $itemViewModelFactory)
    {
    }

    public function createOrderViewModelByOrderDTO(OrderDTO $orderDTO): OrderViewModel
    {
        return new OrderViewModel(
            status: $orderDTO->status->value,
            type: $orderDTO->type->value,
            subtotalAmount: $orderDTO->nettAmount->render(),
            totalAmount: $orderDTO->grossAmount->render(),
            paymentMethod: $orderDTO->paymentMethod ?? '',
            isPaid: $orderDTO->isPaid,
            annotation: $orderDTO->annotation ?? '',
            orderItems: $orderDTO->orderItems
                ->map([
                    $this->itemViewModelFactory,
                    'createOrderItemViewModelByOrderItemDTO'
                ])
                ->map(fn($item) => $item->toArray())
                ->toArray(),
        );
    }
}
