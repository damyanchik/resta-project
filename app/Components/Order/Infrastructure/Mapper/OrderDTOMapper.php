<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Mapper;

use App\Components\Common\DTO\PriceDTO;
use App\Components\Order\Domain\DTO\OrderDTO;
use App\Components\Order\Domain\DTO\OrderItemDTO;
use App\Components\Order\Domain\Model\Order;
use App\Components\Order\Domain\Model\OrderItem;
use Illuminate\Support\Collection;

class OrderDTOMapper
{
    public function fromOrderModel(Order $order, Collection $orderItems): OrderDTO
    {
        return new OrderDTO(
            status: $order->status,
            type: $order->type,
            nettAmount: $order->nett_amount,
            grossAmount: $order->gross_amount,
            paymentMethod: $order->payment_method,
            isPaid: $order->is_paid,
            annotation: $order->annotation,
            orderItems: $orderItems->map(fn($item) => $this->fromOrderItemModel($item)),
        );
    }

    private function fromOrderItemModel(OrderItem $item): OrderItemDTO
    {
        return new OrderItemDTO(
            productUuid: $item->product_uuid,
            sumNettPrice: $item->nett_amount,
            sumGrossPrice: $item->nett_amount,
            unitPrice: new PriceDTO(
                nett: $item->nett_amount,
                gross: $item->nett_amoun,
                rate: 0,
            ),
            quantity: $item->quantity,
            status: $item->status,
            message: $item->message,
            orderNr: $item->order_nr,
        );
    }
}
