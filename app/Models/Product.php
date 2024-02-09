<?php

namespace App\Models;

use App\Enums\ProductAvailabilityEnum;
use App\Helpers\PriceHelper;
use App\Helpers\StockHelper;
use App\Models\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SortableTrait;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'stock',
        'price',
        'is_unlimited',
        'is_vegetarian',
        'is_spicy',
        'is_available',
        'category_id',
    ];

    protected $casts = [
        'is_available' => ProductAvailabilityEnum::class,
    ];

    public function scopeSearch(Builder $query, string $searchTerm): Builder
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

    public function getFormattedPriceToFormAttribute(): float
    {
        return PriceHelper::convertIntToFloatPrice($this->attributes['price']);
    }

    public function getFormattedStockAttribute(): string
    {
        return StockHelper::formatStock($this->attributes['stock']);
    }

    public function getFormattedIsAvailableAttribute(): string
    {
        return $this->is_available->name();
    }

}
