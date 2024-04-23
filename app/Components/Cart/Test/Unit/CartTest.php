<?php

declare(strict_types=1);

namespace App\Components\Cart\Test\Unit;

use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Factory\CartDTOFactory;
use App\Components\Cart\Infrastructure\Http\Session\Cart;
use App\Components\Cart\Infrastructure\Service\CartService;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;
use Mockery as M;

class CartTest extends TestCase
{
    public function testUpdate()
    {
        $session = M::mock(Session::class);
        $session
            ->shouldReceive('get')
            ->andReturn([]);

        $productUuid = Str::uuid()->toString();

        $shopcartService = M::mock(CartService::class);
        $shopcartService
            ->shouldReceive('getValidatedItems')
            ->andReturn([$productUuid => ['quantity' => 10]]);

        $shopcartSession = new Cart(
            session: $session,
            shopcartService: $shopcartService,
            factory: M::mock(CartDTOFactory::class),
        );

        $shopcartSession->update(new CartItemFormableDTO(
            quantity: 10,
            productUuid: $productUuid,
        ));


    }

}
