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
        $totalPrice = 0;
        $qty = 0;
        for ($i=0; $i < count($cart) ; $i++) {
            $totalPrice += $cart[$i]->quantity * $cart[$i]->products->price;
            $qty += $cart[$i]->quantity;
        }
        // $totalPrice = number_format($totalPrice, 2, ',', '.');
        return view('cart.index', [
            'carts' => $cart,
            'userId'=>$request->userId,
            'totalPrice'=>$totalPrice,
            'qty' => $qty
         ]);
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
            return redirect("/cart/{$request->userId}");
        } else {
            return redirect("/cart/{$request->userId}");
        }
    }

    public function destroy(Request $request)
    {
        Cart::destroy($request->cartId);

        return redirect("/cart/{$request->userId}");
    }
}
