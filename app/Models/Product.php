<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'type',
        'user'
    ];

    public function get_seller()
    {
        return $this->hasOne(User::class, 'id', 'user');
    }
}
