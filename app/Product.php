<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";
    protected $primaryKey = "id";
    
    public function cart() {
        return $this->hasMany('App\Cart', 'productId');
    }
}
