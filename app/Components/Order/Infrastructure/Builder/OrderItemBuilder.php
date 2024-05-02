<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Builder;

use Akaunting\Money\Money;
use App\Components\Common\DTO\PriceDTO;
use App\Components\Finance\Application\Calculator\PriceCalculator;
use App\Components\Order\Domain\DTO\OrderEntryItemDTO;
use App\Components\Order\Domain\DTO\OrderItemFormableDTO;
use App\Components\Order\Domain\Enum\OrderItemStatusEnum;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Infrastructure\Resolver\OrderResolver;
use App\Components\Order\Infrastructure\Validator\OrderItemValidator;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Domain\DTO\ProductBasicDTO;
use Illuminate\Support\Collection;

class OrderItemBuilder
{
    private OrderItemStatusEnum $status;
    private string $discountCode;
    private Collection $orderEntryItemDTOs;

    public function __construct(
        private readonly PriceCalculator $priceCalculator,
        private readonly ProductRepository $productRepository,
        private readonly OrderResolver $orderResolver,
    )
    {
    }

    /**
     * @param Collection<int, OrderEntryItemDTO> $orderEntryItemDTOs
     * @return $this
     */
    public function setOrderEntryItems(Collection $orderEntryItemDTOs): self
    {
        $this->orderEntryItemDTOs = $orderEntryItemDTOs;

        return $this;
    }

    public function setOrderStatus(OrderStatusEnum $orderStatus): self
    {
        $this->status = match ($orderStatus) {
            OrderStatusEnum::RECEIVED,
            OrderStatusEnum::PREPARING => OrderItemStatusEnum::PREPARING,
            OrderStatusEnum::READY,
            OrderStatusEnum::CLOSED => OrderItemStatusEnum::READY,
            OrderStatusEnum::CANCELLED => OrderItemStatusEnum::CANCELLED,
        };

        return $this;
    }

    public function setDiscount(string $code): self
    {
        $this->discountCode = $code;

        return $this;
    }

    public function build()
    {
        $productBasicDTOs = $this->getProductBasicDTOs(
            productUuids: $this->orderResolver->resolveProductUuidsFromOrderEntryItemDTOs($this->orderEntryItemDTOs),
        );

        return $this->orderEntryItemDTOs->map(function ($entryItemDTO) use ($productBasicDTOs) {
            $productBasicDTO = $productBasicDTOs->get($entryItemDTO->productUuid);

            OrderItemValidator::orderItemAvailability($productBasicDTO, $entryItemDTO->quantity);

            return new OrderItemFormableDTO(
                status: $this->status,
                productUuid: $entryItemDTO->productUuid,
                price: new PriceDTO(
                    nett: $this->priceCalculator->calculateNettFromGross(
                        amount: $productBasicDTO->price,
                        taxRate: $productBasicDTO->rate,
                    ),
                    gross: $productBasicDTO->price,
                    rate: $productBasicDTO->rate,
                ),
                quantity: $entryItemDTO->quantity,
            );
        });
    }

    /**
     * @param array $productUuids
     * @return Collection<int,ProductBasicDTO>
     */
    private function getProductBasicDTOs(array $productUuids): Collection
    {
        return $this->productRepository->getProductBasicDTOs(
            uuids: $productUuids,
        );
    }
}
