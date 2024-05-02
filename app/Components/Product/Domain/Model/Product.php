<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\Model;

use App\Components\Common\CustomCast\MoneyCast;
use App\Components\Order\Domain\Model\OrderItem;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    use HasUuids;

    public $incrementing = false;
    protected $primaryKey = 'uuid';
    protected $keyType='string';
    protected $table = 'products';
    protected $casts = [
        'price' => MoneyCast::class,
        'is_unlimited' => 'boolean',
        'is_vegetarian' => 'boolean',
        'is_spicy' => 'boolean',
        'is_available' => 'boolean',
    ];
    protected $fillable = [
        'name',
        'description',
        'stock',
        'price',
        'rate',
        'is_unlimited',
        'is_vegetarian',
        'is_spicy',
        'is_available',
        'order_nr',
        'category_uuid',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'product_uuid', 'uuid');
    }
}
