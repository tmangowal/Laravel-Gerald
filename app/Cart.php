<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = "carts";
    protected $primaryKey = "id";
    protected $foreignKey = "productId";
    protected $fillable = ['productId','userId','quantity'];

    public function product() {
        return $this->belongsTo('App\Product');
    }
}
