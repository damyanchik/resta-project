<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Resolver;

use App\Components\Order\Domain\DTO\OrderEntryItemDTO;
use App\Components\Order\Domain\DTO\OrderItemFormableDTO;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class OrderResolver
{
    private const ORDER_UUID_ATTRIBUTE = 'order_uuid';

    /**
     * @param Collection<int,OrderEntryItemDTO> $orderEntryItemDTOs
     * @return array<int, string>
     */
    public function resolveProductUuidsFromOrderEntryItemDTOs(Collection $orderEntryItemDTOs): array
    {
        return $orderEntryItemDTOs->map(fn(OrderEntryItemDTO $itemDTO) => $itemDTO->productUuid)->values()->toArray();
    }

    /**
     * @param string $orderUuid
     * @param Collection<int, OrderItemFormableDTO> $orderItemFormableDTOs
     * @return array
     */
    public function resolveUuidAndOrderItemFormableToArray(string $orderUuid, Collection $orderItemFormableDTOs): array
    {
        return $orderItemFormableDTOs
            ->map(fn ($item) => $item->toArray() + [self::ORDER_UUID_ATTRIBUTE => $orderUuid] + ['uuid' => Str::uuid()->toString()])
            ->toArray();
    }
}
