<?php

declare(strict_types=1);

namespace App\Components\Order\Infrastructure\Builder;

use App\Components\Order\Domain\DTO\OrderFormableDTO;
use App\Components\Order\Domain\DTO\OrderItemFormableDTO;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use App\Components\Order\Infrastructure\Calculator\OrderAmountCalculator;
use Illuminate\Support\Collection;

class OrderBuilder
{
    private Collection $orderItemFormableDTOs;
    private OrderStatusEnum $orderStatusEnum = OrderStatusEnum::RECEIVED;
    private OrderTypeEnum $orderTypeEnum;
    private bool $isPaid = false;
    private string $paymentMethod;
    private string $annotation;
    private ?string $discountCode = null;


    public function __construct(
        private OrderAmountCalculator $orderAmountCalculator,
    )
    {
    }

    public function setStatus(OrderStatusEnum $orderStatusEnum): self
    {
        $this->orderStatusEnum = $orderStatusEnum;

        return $this;
    }

    public function setType(OrderTypeEnum $orderTypeEnum): self
    {
        $this->orderTypeEnum = $orderTypeEnum;

        return $this;
    }

    /**
     * @param Collection<int, OrderItemFormableDTO> $orderItemFormableDTOs
     * @return $this
     */
    public function setOrderItemFormableDTOs(Collection $orderItemFormableDTOs): self
    {
        $this->orderItemFormableDTOs = $orderItemFormableDTOs;

        return $this;
    }

    public function setPaymentMethod(string $method, bool $isPaid = false): self
    {
        $this->paymentMethod = $method;
        $this->isPaid = $isPaid;

        return $this;
    }

    public function setAnnotation(string $text): self
    {
        $this->annotation = $text;

        return $this;
    }

    public function build(): OrderFormableDTO
    {
        return new OrderFormableDTO(
            status: $this->orderStatusEnum,
            type: $this->orderTypeEnum,
            nettAmount: $this->orderAmountCalculator->sumNettOrderAmount($this->orderItemFormableDTOs),
            grossAmount: $this->orderAmountCalculator->sumGrossOrderAmount($this->orderItemFormableDTOs),
            paymentMethod: $this->paymentMethod,
            isPaid: $this->isPaid,
            annotation: $this->annotation,
        );
    }
}
