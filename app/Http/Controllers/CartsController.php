<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class CartsController extends Controller
{
    //
    public function index(Request $request)
    {
        $cart = Cart::where(['userId'=>$request->userId])->get();
        return view('cart.index', ['carts' => $cart, 'userId'=>$request->userId]);
    }

    public function editCart(Request $request)
    {
        $cart = Cart::where(['id'=>$request->cartId])->get();

        return view('cart.edit', ['cart' => $cart]);
    }

    public function edit(Request $request)
    {
        $cart = Cart::where(['id'=>$request->cartId])->get();
        if ($request->newQty > 0) {
            $cart[0]->quantity = $request->newQty;
            $cart[0]->save();
            return redirect('/home');
        } else {
            return redirect('/cart/edit/' + $request->cartId);
        }
    }
}
