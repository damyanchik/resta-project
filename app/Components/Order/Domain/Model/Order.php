<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $table = 'orders';

    protected $fillable = [
        'status',
        'type',
        'subtotal_amount',
        'total_amount',
        'payment_method',
        'is_paid',
        'annotation',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
