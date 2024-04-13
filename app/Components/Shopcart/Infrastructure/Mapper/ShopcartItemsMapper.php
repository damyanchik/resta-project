<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Mapper;

use App\Components\Shopcart\Domain\DTO\ShopcartItemFormableDTO;
use Illuminate\Support\Collection;

class ShopcartItemsMapper
{
    public function toFormableDTOs(array $shopcartItems): Collection
    {
        return (new Collection($shopcartItems))
            ->map(function ($item, $uuid) {
                return new ShopcartItemFormableDTO(
                    quantity: $item['quantity'],
                    productUuid: $uuid,
                );
            })
            ->values();
    }

    public function fromShopcartFormableDTOs(Collection $shopcartItems): array
    {
        return $shopcartItems->mapWithKeys(function ($item) {
                return [$item->productUuid => ['quantity' => $item->quantity]] ;
            })
            ->toArray();
    }
}
