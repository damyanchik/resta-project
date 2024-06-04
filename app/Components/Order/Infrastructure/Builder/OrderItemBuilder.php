<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Builder;

use App\Components\Common\DTO\PriceDTO;
use App\Components\Order\Domain\DTO\OrderEntryItemDTO;
use App\Components\Order\Domain\DTO\OrderItemFormableDTO;
use App\Components\Order\Domain\Enum\OrderItemStatusEnum;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Infrastructure\Mapper\OrderedProductDTOMapper;
use App\Components\Order\Infrastructure\Resolver\OrderResolver;
use App\Components\Order\Infrastructure\Validator\OrderItemValidator;
use App\Components\Product\Application\Repository\ProductRepository;
use App\Components\Product\Domain\Model\Product;
use Illuminate\Support\Collection;

class OrderItemBuilder
{
    private OrderItemStatusEnum $status;
    private string $discountCode;
    private Collection $orderEntryItemDTOs;

    public function __construct(
        private readonly ProductRepository       $productRepository,
        private readonly OrderResolver           $orderResolver,
        private readonly OrderedProductDTOMapper $orderedProductDTOMapper,
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

    public function build(): Collection
    {
        $orderedProductsFromDB = $this->getOrderedProducts();

        return $this->orderEntryItemDTOs->map(function ($entryItemDTO) use ($orderedProductsFromDB) {
            $orderedProductFromDB = $orderedProductsFromDB->get($entryItemDTO->productUuid);

            OrderItemValidator::orderItemAvailability($orderedProductFromDB, $entryItemDTO->quantity);

            return new OrderItemFormableDTO(
                status: $this->status,
                productUuid: $entryItemDTO->productUuid,
                price: new PriceDTO(
                    nett: $orderedProductFromDB->price->nett,
                    gross: $orderedProductFromDB->price->gross,
                    rate: $orderedProductFromDB->price->rate,
                ),
                quantity: $entryItemDTO->quantity,
            );
        });
    }

    /** @return Collection<string|Product> */
    private function getOrderedProducts(): Collection
    {
        $products = $this->productRepository->getByUuids(
            $this->orderResolver->resolveProductUuidsFromOrderEntryItemDTOs($this->orderEntryItemDTOs)
        );

        return $products->mapWithKeys(fn(Product $product) => [
            $product->getKey() => $this->orderedProductDTOMapper->fromProductModel($product),
        ]);
    }
}
