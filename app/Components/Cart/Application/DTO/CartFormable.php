<?php

declare(strict_types=1);

namespace App\Components\Cart\Application\DTO;

interface CartFormable
{
    public function quantity(): int;
}
