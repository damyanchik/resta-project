<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory;

use App\Components\Order\Application\DTO\OrderFormable;
use App\Components\Order\Domain\DTO\OrderDTO;
use App\Components\Order\Domain\DTO\OrderFormableDTO;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use Illuminate\Support\Collection;

class OrderDTOFactory
{
    public function __construct(private readonly OrderItemDTOFactory $itemDTOFactory)
    {
    }

    public function createOrderDTO(OrderTypeEnum $type, Collection $items): OrderDTO
    {
        return new OrderDTO(
            status: OrderStatusEnum::PREPARING,
            type: $type,
            subtotalAmount: $items->sum(fn($item) => $item['subtotal_price']),
            totalAmount: $items->sum(fn($item) => $item['total_price']),
            paymentMethod: null,
            isPaid: false,
            annotation: null,
            orderItems: $items->map([$this->itemDTOFactory, 'createOrderItemDTO'])
        );
    }

    public function createOrderFormableDTO(OrderFormable $orderFormable): OrderFormableDTO
    {
        return new OrderFormableDTO(
            status: $orderFormable->status(),
            type: $orderFormable->type(),
            subtotalAmount: (int) $orderFormable->subtotalAmount(),
            totalAmount: (int) $orderFormable->totalAmount(),
            paymentMethod: $orderFormable->paymentMethod(),
            isPaid: $orderFormable->isPaid(),
            annotation: $orderFormable->annotation(),
        );
    }
}
