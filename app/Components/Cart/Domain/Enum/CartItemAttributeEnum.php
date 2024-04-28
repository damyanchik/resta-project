<?php

declare(strict_types=1);

namespace App\Components\Cart\Domain\Enum;

enum CartItemAttributeEnum: string
{
    case QUANTITY = 'quantity';
    case PRODUCT_UUID = 'product_uuid';
}
