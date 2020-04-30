<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Product;

class ProductsController extends Controller
{
    //
    public function index () {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    public function detail ($id) {
        $product = Product::find($id);

        return view('product.detail', ['product' => $product]);
    }

    public function addToCart (Request $request) { 
        $cart = Cart::where([
            'userId'=>$request->userId,
            'productId'=>$request->productId,
        ])->get();

        if (count($cart)) {
            $cart[0]->quantity += 1;
            $cart[0]->save();
        } else {
            Cart::create([
                'userId'=>$request->userId,
                'productId'=>$request->productId,
                'quantity'=>$request->quantity
            ]);
        }

        return redirect('/product');
    }
}
