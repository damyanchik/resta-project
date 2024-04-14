<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Application\DTO;

interface ShopcartFormable
{
    public function quantity(): int;
}
