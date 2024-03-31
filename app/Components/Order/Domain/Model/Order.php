<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Model;

use App\Components\Common\Model\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Nonstandard\Uuid;

class Order extends Model
{
    use HasFactory;
    use HasUuid;

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
    ];
}
