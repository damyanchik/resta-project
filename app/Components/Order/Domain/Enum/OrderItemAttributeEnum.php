<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Enum;

enum OrderItemAttributeEnum: string
{
    case QUANTITY = 'quantity';
    case PRODUCT_UUID = 'product_uuid';
}
