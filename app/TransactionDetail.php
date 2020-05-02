<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    //
    protected $table = "transaction_details";
    protected $primaryKey = "id";
    protected $fillable = [
        'transactionId',
        'productId',
        'price',
        'quantity',
    ];
}
