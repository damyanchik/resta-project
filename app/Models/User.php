<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SortableTrait;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'is_active',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeSearch(Builder $query, $searchTerm): Builder
    {
        return $query->where(function ($query) use ($searchTerm) {
            $query->orWhere('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('surname', 'like', '%' . $searchTerm . '%')
                ->orWhere('email', 'like', '%' . $searchTerm . '%');
        });
    }
}
