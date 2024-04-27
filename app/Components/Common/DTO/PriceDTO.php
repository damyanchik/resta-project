<?php

declare(strict_types=1);

namespace App\Components\Common\DTO;

use Akaunting\Money\Money;

class PriceDTO
{
    public function __construct(
        public readonly Money $nett,
        public readonly Money $gross,
        public readonly int   $rate,
    )
    {
    }
}
