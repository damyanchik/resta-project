<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Model;

use App\Components\Common\CustomCast\MoneyCast;
use App\Components\Order\Domain\Enum\OrderStatusEnum;
use App\Components\Order\Domain\Enum\OrderTypeEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    use HasUuids;

    public $incrementing = false;
    protected $primaryKey = 'uuid';
    protected $keyType='string';
    protected $table = 'orders';
    protected $casts = [
        'status' => OrderStatusEnum::class,
        'type' => OrderTypeEnum::class,
        'is_paid' => 'boolean',
        'nett_amount' => MoneyCast::class,
        'gross_amount' => MoneyCast::class,
    ];
    protected $fillable = [
        'status',
        'type',
        'nett_amount',
        'gross_amount',
        'payment_method',
        'is_paid',
        'annotation',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_uuid', 'uuid');
    }
}
