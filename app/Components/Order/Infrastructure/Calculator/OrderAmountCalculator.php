<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Calculator;

use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use App\Components\Order\Domain\DTO\OrderItemFormableDTO;
use Illuminate\Support\Collection;

class OrderAmountCalculator
{
    /**
     * @param Collection<int, OrderItemFormableDTO> $orderItemFormableDTOs
     * @return Money
     */
    public function sumGrossOrderAmount(Collection $orderItemFormableDTOs): Money
    {
        return new Money(
            amount: $orderItemFormableDTOs->sum(
                callback: fn(OrderItemFormableDTO $formableDTO) => $formableDTO->sumGrossPrice()->getAmount(),
            ),
            currency: new Currency('EUR'),
        );
    }

    /**
     * @param Collection<int, OrderItemFormableDTO> $orderItemFormableDTOs
     * @return Money
     */
    public function sumNettOrderAmount(Collection $orderItemFormableDTOs): Money
    {
        return new Money(
            amount: $orderItemFormableDTOs->sum(
                callback: fn(OrderItemFormableDTO $formableDTO) => $formableDTO->sumNettPrice()->getAmount(),
            ),
            currency: new Currency('EUR'),
        );
    }
}
