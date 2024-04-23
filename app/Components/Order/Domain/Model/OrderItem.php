<?php

declare(strict_types=1);

namespace App\Components\Order\Domain\Model;

use App\Components\Common\CustomCast\MoneyCast;
use App\Components\Order\Domain\Enum\OrderItemStatusEnum;
use App\Components\Product\Domain\Model\Product;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'uuid';
    protected $table = 'order_items';
    protected $casts = [
        'status' => OrderItemStatusEnum::class,
        'subtotal_unit_price' => MoneyCast::class,
        'total_unit_price' => MoneyCast::class,
        'subtotal_price' => MoneyCast::class,
        'total_price' => MoneyCast::class,
    ];
    protected $fillable = [
        'product_uuid',
        'subtotal_unit_price',
        'total_unit_price',
        'subtotal_price',
        'total_price',
        'quantity',
        'status',
        'annotation',
        'order_nr',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_uuid', 'uuid');
    }
}
