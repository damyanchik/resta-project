<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Test\Unit;

use App\Components\Shopcart\Domain\DTO\ShopcartItemFormableDTO;
use App\Components\Shopcart\Infrastructure\Factory\ShopcartDTOFactory;
use App\Components\Shopcart\Infrastructure\Http\Session\Shopcart;
use App\Components\Shopcart\Infrastructure\Service\ShopcartService;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;
use Mockery as M;

class ShopcartTest extends TestCase
{
    public function testUpdate()
    {
        $session = M::mock(Session::class);
        $session
            ->shouldReceive('get')
            ->andReturn([]);

        $productUuid = Str::uuid()->toString();

        $shopcartService = M::mock(ShopcartService::class);
        $shopcartService
            ->shouldReceive('getValidatedItems')
            ->andReturn([$productUuid => ['quantity' => 10]]);

        $shopcartSession = new Shopcart(
            session: $session,
            shopcartService: $shopcartService,
            factory: M::mock(ShopcartDTOFactory::class),
        );

        $shopcartSession->update(new ShopcartItemFormableDTO(
            quantity: 10,
            productUuid: $productUuid,
        ));


    }

}
