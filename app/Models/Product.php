<?php

namespace App\Models;

use App\Models\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SortableTrait;

    protected $fillable = [
        'name',
        'description',
        'availability',
        'stock',
        'price',
        'is_vegetarian',
        'is_spicy',
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
}
