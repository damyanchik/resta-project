<?php

declare(strict_types=1);

namespace App\Components\Cart\Test\Unit;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Mapper\CartDTOMapper;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class CartItemsMapperTest extends TestCase
{
    private CartDTOMapper $mapper;

    public function testToCartFormableDTOs(): void
    {
        $items = [
            Str::uuid()->toString() => ['quantity' => 50],
            Str::uuid()->toString() => ['quantity' => 100],
        ];

        $cartDTOs = $this->mapper->toFormableDTOs($items);

        $this->assertSame(array_values($items)[0]['quantity'], $cartDTOs->first()->quantity);
        $this->assertSame(array_values($items)[1]['quantity'], $cartDTOs->last()->quantity);
        $this->assertSame(array_keys($items)[0], $cartDTOs->first()->productUuid);
        $this->assertSame(array_keys($items)[1], $cartDTOs->last()->productUuid);

    }

    public function testFromCartFormableDTOs(): void
    {
        $itemDTOs = Collection::make([
            new CartItemFormableDTO(5, Str::uuid()->toString()),
            new CartItemFormableDTO(10, Str::uuid()->toString()),
        ]);

        $cartItems = $this->mapper->toCartSession($itemDTOs);

        $this->assertSame($itemDTOs->first()->quantity, array_values($cartItems)[0]['quantity']);
        $this->assertSame($itemDTOs->last()->quantity, array_values($cartItems)[1]['quantity']);
        $this->assertSame($itemDTOs->first()->productUuid, array_keys($cartItems)[0]);
        $this->assertSame($itemDTOs->last()->productUuid, array_keys($cartItems)[1]);

    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->mapper = new CartDTOMapper();
    }
}
