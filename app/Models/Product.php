<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\ProductGallery;
use App\Models\User;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'name',
        'slug',
        'user_id',
        'price',
        'description',
        'categories_id'
    ];

    function galleries(){

        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    function user(){
        
        // return $this->belongsTo(User::class, 'id', 'user_id');
        return $this->belongsTo(User::class);
    }
    function category(){
        
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}