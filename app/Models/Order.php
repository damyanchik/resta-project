<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'amount',
        'total_price',
        'state',
        'payment_method',
        'is_paid',
        'user_message',
    ];

    public function scopeSearch(Builder $query, string $searchTerm): Builder
    {
        return $query
            ->where(function ($query) use ($searchTerm) {
                $query->orWhere('orders.quantity', 'like', '%' . $searchTerm . '%');
            })
            ->select(
                'orders.*',
            );
    }
}
