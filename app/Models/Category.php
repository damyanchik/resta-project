<?php

namespace App\Models;

use App\Models\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, SortableTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'is_visible',
        'order_nr',
    ];

    public function scopeSearch(Builder $query, string $searchTerm): Builder
    {
        return $query
            ->where(function ($query) use ($searchTerm) {
                $query->orWhere('categories.name', 'like', '%' . $searchTerm . '%');
            })
            ->select(
                'categories.*',
            );
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
