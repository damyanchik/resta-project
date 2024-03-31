<?php

declare(strict_types=1);

namespace App\Components\Category\Domain\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'uuid';

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'is_visible',
        'order_nr',
    ];
}
