<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Product;

class ProductGallery extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "products_galleries";

    protected $fillable = [
        'products_id',
        'photo'
    ];


    function product(){
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    function user(){

        return $this->product()->user();
    }
}