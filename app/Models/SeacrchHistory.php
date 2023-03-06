<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeacrchHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price_from',
        'price_to',
        'type',
        'user'
    ];

    public function get_user()
    {
        return $this->hasOne(User::class, 'id', 'user');
    }
}
