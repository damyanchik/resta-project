<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Calculator;

use Akaunting\Money\Money;
use App\Components\Order\Domain\DTO\OrderItemFormableDTO;
use Illuminate\Support\Collection;

class OrderAmountCalculator
{
    public function __construct()
    {
    }

    /**
     * @param Collection<int, OrderItemFormableDTO> $orderItemFormableDTOs
     * @return Money
     */
    public function sumGrossOrderAmount(Collection $orderItemFormableDTOs): Money
    {
        return Money::EUR($orderItemFormableDTOs->sum(
            callback: fn(OrderItemFormableDTO $formableDTO) => $formableDTO->sumGrossPrice()->getAmount(),
        ));
    }

    /**
     * @param Collection<int, OrderItemFormableDTO> $orderItemFormableDTOs
     * @return Money
     */
    public function sumNettOrderAmount(Collection $orderItemFormableDTOs): Money
    {
        return Money::EUR($orderItemFormableDTOs->sum(
            callback: fn(OrderItemFormableDTO $formableDTO) => $formableDTO->sumNettPrice()->getAmount(),
        ));
    }
}
