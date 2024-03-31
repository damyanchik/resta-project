<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'subtotal_unit_price',
        'total_unit_price',
        'subtotal_price',
        'total_price',
        'quantity',
        'status',
        'annotation',
        'order_nr',
        'product_uuid',
    ];
}
