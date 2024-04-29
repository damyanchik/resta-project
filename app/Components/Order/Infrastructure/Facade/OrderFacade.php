<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Facade;

use App\Components\Cart\Application\Facade\CartFacade;
use App\Components\Order\Application\DTO\OrderFormable;
use App\Components\Order\Domain\Exception\OrderItemException;
use App\Components\Order\Infrastructure\Factory\OrderDTOFactory;
use App\Components\Order\Infrastructure\Repository\OrderRepository;

class OrderFacade
{
    public function __construct(
        private readonly CartFacade      $cartFacade,
        private readonly OrderRepository $orderRepository,
        private readonly OrderDTOFactory $orderDTOFactory,
    )
    {
    }

    /**
     * @throws OrderItemException
     */
    public function createByFormable(OrderFormable $orderFormable): bool
    {
        return $this->orderRepository->create(
            $this->orderDTOFactory->createOrderFormableDTO(
                status: $orderFormable->status(),
                type: $orderFormable->type(),
                items: $orderFormable->items(),
                paymentMethod: $orderFormable->paymentMethod(),
                annotation: $orderFormable->annotation(),
                isPaid: $orderFormable->isPaid(),
            ),
        );

        //service do zapisu order i osobno items
        //builder?
        //usuniecie z DTO obliczanie?
    }

    public function showOrderByUuid(string $uuid)
    {

    }

    public function createBySelfCartSession()
    {
        $this->cartFacade->getFormableCart();

        //quantity
        //productUuid
        //discount - do liczenia - najpierw zwykle liczenie? a potem to?

        //
    }
}
