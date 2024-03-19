<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'status',
        'type',
        'subtotal_amount',
        'total_amount',
        'payment_method',
        'is_paid',
        'annotation',
        'user_message',
    ];
}
