<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = "transactions";
    protected $primaryKey = "id";
    protected $fillable = [
        'userId',
        'price',
        'quantity',
        'status',
        'userPayment',
        'completedDate',
        'fullName',
        'address',
         'city',
        'district',
        'province',
        'zip',
        'phone'
    ];
}
