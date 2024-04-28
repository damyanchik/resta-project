<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory;

use Akaunting\Money\Money;
use App\Components\Order\Domain\DTO\OrderFormableDTO;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use App\Components\Order\Domain\Exception\OrderItemException;
use Illuminate\Support\Collection;

class OrderDTOFactory
{
    public function __construct(private readonly OrderItemDTOFactory $orderItemDTOFactory)
    {
    }

    /**
     * @throws OrderItemException
     */
    public function createOrderFormableDTO(
        OrderStatusEnum $status,
        OrderTypeEnum   $type,
        Collection      $items,
        string          $paymentMethod,
        string          $annotation,
        bool            $isPaid = false,
    ): OrderFormableDTO
    {
        $orderItems = $this->orderItemDTOFactory->createItemFormableDTOsByFormableItems($items);

        return new OrderFormableDTO(
            status: $status,
            type: $type,
            subtotalAmount: Money::EUR($orderItems->sum(fn($orderItem) => $orderItem->subtotalPrice->getAmount())),
            totalAmount: Money::EUR($orderItems->sum(fn($orderItem) => $orderItem->totalPrice->getAmount())),
            paymentMethod: $paymentMethod,
            isPaid: $isPaid,
            annotation: $annotation,
            items: $orderItems,
        );
    }
}
