<?php

declare(strict_types=1);

namespace App\Components\Product\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'name',
        'description',
        'stock',
        'price',
        'is_unlimited',
        'is_vegetarian',
        'is_spicy',
        'is_available',
        'order_nr',
        'category_id',
    ];
}
