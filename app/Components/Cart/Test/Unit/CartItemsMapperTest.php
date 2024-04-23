<?php

declare(strict_types=1);

namespace App\Components\Cart\Test\Unit;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Mapper\CartItemsMapper;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class CartItemsMapperTest extends TestCase
{
    private CartItemsMapper $mapper;

    public function testToShopcartFormableDTOs(): void
    {
        $items = [
            Str::uuid()->toString() => ['quantity' => 50],
            Str::uuid()->toString() => ['quantity' => 100],
        ];

        $shopcartDTOs = $this->mapper->toFormableDTOs($items);

        $this->assertSame(array_values($items)[0]['quantity'], $shopcartDTOs->first()->quantity);
        $this->assertSame(array_values($items)[1]['quantity'], $shopcartDTOs->last()->quantity);
        $this->assertSame(array_keys($items)[0], $shopcartDTOs->first()->productUuid);
        $this->assertSame(array_keys($items)[1], $shopcartDTOs->last()->productUuid);

    }

    public function testFromShopcartFormableDTOs(): void
    {
        $itemDTOs = Collection::make([
            new CartItemFormableDTO(5, Str::uuid()->toString()),
            new CartItemFormableDTO(10, Str::uuid()->toString()),
        ]);

        $shopcartItems = $this->mapper->fromShopcartFormableDTOs($itemDTOs);

        $this->assertSame($itemDTOs->first()->quantity, array_values($shopcartItems)[0]['quantity']);
        $this->assertSame($itemDTOs->last()->quantity, array_values($shopcartItems)[1]['quantity']);
        $this->assertSame($itemDTOs->first()->productUuid, array_keys($shopcartItems)[0]);
        $this->assertSame($itemDTOs->last()->productUuid, array_keys($shopcartItems)[1]);

    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->mapper = new CartItemsMapper();
    }
}
