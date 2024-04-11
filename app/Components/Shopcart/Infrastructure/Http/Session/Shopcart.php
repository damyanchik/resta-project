<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Infrastructure\Http\Session;

use App\Components\Shopcart\Domain\DTO\ShopcartDTO;
use App\Components\Shopcart\Domain\DTO\ShopcartItemFormableDTO;
use App\Components\Shopcart\Infrastructure\Factory\ShopcartDTOFactory;
use App\Components\Shopcart\Infrastructure\Service\ShopcartService;
use Illuminate\Contracts\Session\Session;

class Shopcart
{
    public function __construct(
        private readonly Session            $session,
        private readonly ShopcartService    $shopcartService,
        private readonly ShopcartDTOFactory $factory,
    )
    {
    }

    public function update(ShopcartItemFormableDTO $shopcartDTO): void
    {
        $shopcart = $this->session->get('shopcart', []);

        $shopcart[$shopcartDTO->productUuid] = $shopcartDTO->quantity;

        $shopcartItems = $this->shopcartService->getValidatedItems($shopcart);

        $this->session->put('shopcart', $shopcartItems);
    }

    public function show(): ?ShopcartDTO
    {
        $shopcart = $this->session->get('shopcart', []);

        if (empty($shopcart)) {
            return null;
        }

        $shopcartItems = $this->shopcartService->getValidatedItems($shopcart);
        $this->session->put('shopcart', $shopcartItems);

        return $this->factory->createShopcartDTO($shopcartItems);
    }

    public function get()
    {
        //wez konkretny?
    }

    public function remove()
    {

    }
}
