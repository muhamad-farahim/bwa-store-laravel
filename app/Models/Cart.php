<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id',
        'users_id'
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'user');
    }
    function product(){
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
}