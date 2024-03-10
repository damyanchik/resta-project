<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'unit_price',
        'total_price',
        'state',
        'payment_method',
        'is_paid',
        'user_message',
    ];
}
