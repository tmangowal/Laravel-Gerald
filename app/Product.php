<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable = ['productName', 'price', 'image', 'desc', 'category'];
    
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }
}
