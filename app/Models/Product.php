<?php

namespace App\Models;

use App\Enums\ProductAvailabilityEnum;
use App\Helpers\PriceHelper;
use App\Helpers\StockHelper;
use App\Models\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SortableTrait;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'availability',
        'stock',
        'price',
        'is_unlimited',
        'is_vegetarian',
        'is_spicy',
        'category_id',
    ];

    protected $casts = [
        'availability' => ProductAvailabilityEnum::class,
    ];

    public function scopeSearch($query, string $searchTerm)
    {
        return $query
            ->where(function ($query) use ($searchTerm) {
                $query->orWhere('products.name', 'like', '%' . $searchTerm . '%');
            })
            ->select(
                'products.*',
            );
    }

    public function getFormattedPriceAttribute(): string
    {
        return PriceHelper::formatPrice($this->attributes['price'], 'PLN');
    }

    public function getFormattedStockAttribute(): string
    {
        return StockHelper::formatStock($this->attributes['stock']);
    }

    public function getFormattedAvailabilityAttribute(): string
    {
        return $this->availability->name();
    }

}
