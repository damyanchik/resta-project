<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Http\Session;

use App\Components\Shopcart\Domain\DTO\ShopcartDTO;
use App\Components\Shopcart\Domain\DTO\ShopcartItemFormableDTO;
use App\Components\Shopcart\Infrastructure\Factory\ShopcartDTOFactory;
use App\Components\Shopcart\Infrastructure\Service\ShopcartService;
use Illuminate\Contracts\Session\Session;

class ShopcartSession
{
    public function __construct(
        private readonly ShopcartService $shopcartService,
        private readonly ShopcartDTOFactory $factory,
    )
    {
    }

    public function update(Session $session, ShopcartItemFormableDTO $shopcartDTO): void
    {
        $shopcart = $session->get('shopcart', []);

        $shopcart[$shopcartDTO->productUuid] = $shopcartDTO->quantity;

        $shopcartItems = $this->shopcartService->getValidatedItems($shopcart);

        $session->put('shopcart', $shopcartItems);
    }

    public function show(Session $session): ?ShopcartDTO
    {
        $shopcart = $session->get('shopcart', []);

        if (empty($shopcart)) {
            return null;
        }

        //reload

        $this->factory->createShopcartItemFormableDTO();
    }

    public function get()
    {
        //wez konkretny?
    }

    public function remove()
    {

    }
}
