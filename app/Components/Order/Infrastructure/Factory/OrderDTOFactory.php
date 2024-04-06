<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Factory;

use Akaunting\Money\Money;
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
        private readonly ProductRepository   $productRepository,
        private readonly ProductModelMapper  $productModelMapper,
    )
    {
    }

    /**
     * @throws OrderItemException
     */
    public function createOrderDTOForPreview(
        OrderTypeEnum $type,
        Collection $items,
        string $annotation
    ): OrderDTO
    {
        $orderItems = $this->getOrderItems($items, [
            'uuid',
            'name',
            'price',
            'is_vegetarian',
            'is_spicy',
        ]);

        return new OrderDTO(
            status: OrderStatusEnum::RECEIVED,
            type: $type,
            subtotalAmount: Money::EUR($orderItems->sum(fn($orderItem) => $orderItem->subtotalPrice->getAmount())),
            totalAmount: Money::EUR($orderItems->sum(fn($orderItem) => $orderItem->totalPrice->getAmount())),
            paymentMethod: null,
            isPaid: false,
            annotation: $annotation,
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
        $orderItems = $this->getOrderItems($items, ['uuid', 'price']);

        return new OrderFormableDTO(
            status: OrderStatusEnum::RECEIVED,
            type: $type,
            subtotalAmount: Money::EUR($orderItems->sum(fn($orderItem) => $orderItem->subtotalPrice->getAmount())),
            totalAmount: Money::EUR($orderItems->sum(fn($orderItem) => $orderItem->totalPrice->getAmount())),
            paymentMethod: $paymentMethod,
            isPaid: false,
            annotation: $annotation,
            items: $orderItems,
        );
    }

    /**
     * @throws OrderItemException
     */
    private function getOrderItems(Collection $items, array $columns = ['*']): Collection
    {
        $products = $this->productRepository
            ->getByUuids($items->pluck('product_uuid')->toArray(), $columns);

        if ($products->isEmpty()) {
            throw OrderItemException::notFound('Order items not found.');
        }

        return $this->productModelMapper->withItemsToOrderItem($products, $items);
    }
}
