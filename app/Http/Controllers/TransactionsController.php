<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use App\Cart;
use App\TransactionDetail;

class TransactionsController extends Controller
{
    //
    public function create(Request $request)
    {
        // $items = $request->items;
        $transaction = Transaction::create([
            'userId'=>$request->userId,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'status'=>$request->status,
            'userPayment'=>$request->userPayment,
            'completedDate'=>$request->completedDate,
            'fullName'=>$request->fullName,
            'address'=>$request->address,
            'city'=>$request->city,
            'district'=>$request->district,
            'province'=>$request->province,
            'zip'=>$request->zip,
            'phone'=>$request->phone,
        ]);
        
        $cartItems = json_decode($request->cartItems);
        $cartIds = array();

        for ($i=0; $i < count($cartItems); $i++) {
            array_push(
                $cartIds,
                [
                    'transactionId' => $transaction->id,
                    'productId' => $cartItems[$i]->products->id,
                    'price' => $cartItems[$i]->products->price,
                    'quantity' => $cartItems[$i]->quantity,
                ]
            );
        }

        $transactionDetails = TransactionDetail::insert($cartIds);
        Cart::destroy(...array_map(function ($val) {
            return $val->id;
        }, $cartItems));

        return redirect('/product');
    }
}
