<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory;

use Akaunting\Money\Money;
use App\Components\Finance\Application\Calculator\PriceCalculator;
use App\Components\Order\Domain\DTO\OrderDTO;
use App\Components\Order\Domain\DTO\OrderFormableDTO;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use App\Components\Order\Domain\Exception\OrderItemException;
use App\Components\Product\Application\Mapper\ProductModelMapper;
use App\Components\Product\Application\Repository\ProductRepository;
use Illuminate\Support\Collection;

class OrderDTOFactory
{
    public function __construct(
        private readonly OrderItemDTOFactory $itemDTOFactory,
        private readonly ProductRepository   $productRepository,
        private readonly ProductModelMapper  $productModelMapper,
        private readonly PriceCalculator     $priceCalculator,
    )
    {
    }

    /**
     * @throws OrderItemException
     */
    public function createOrderDTOForPreview(OrderTypeEnum $type, Collection $items): OrderDTO
    {
        $products = $this->productRepository
            ->getByUuids($items->pluck('product_uuid')->toArray(), [
                'uuid',
                'name',
                'price',
                'is_vegetarian',
                'is_spicy',
            ]);

        if ($products->isEmpty()) {
            throw OrderItemException::notFound('Order items not found.');
        }

        $orderItems = $this->productModelMapper->withItemsToOrderItem($products, $items);

        return new OrderDTO(
            status: OrderStatusEnum::PREPARING,
            type: $type,
            subtotalAmount: Money::EUR($orderItems->sum(fn($orderItem) => $orderItem->subtotalPrice->getAmount())),
            totalAmount: Money::EUR($orderItems->sum(fn($orderItem) => $orderItem->subtotalPrice->getAmount())),
            paymentMethod: null,
            isPaid: false,
            annotation: null,
            orderItems: $orderItems,
        );
    }

    /**
     * @throws OrderItemException
     */
    public function createOrderFormableDTO(
        OrderTypeEnum $type,
        Collection $items,
        string $paymentMethod,
        string $annotation,
    ): OrderFormableDTO
    {
        $products = $this->productRepository
            ->getByUuids($items->pluck('product_uuid')->toArray(), [
                'uuid',
                'price',
            ]);

        if ($products->isEmpty()) {
            throw OrderItemException::notFound('Order items not found.');
        }

        $orderItems = $this->productModelMapper->withItemsToOrderItem($products, $items);

        return new OrderFormableDTO(
            status: OrderStatusEnum::PREPARING,
            type: $type,
            subtotalAmount: Money::EUR($orderItems->sum(fn($orderItem) => $orderItem->subtotalPrice->getAmount())),
            totalAmount: Money::EUR($orderItems->sum(fn($orderItem) => $orderItem->subtotalPrice->getAmount())),
            paymentMethod: $paymentMethod,
            isPaid: false,
            annotation: $annotation,
        );
    }
}
