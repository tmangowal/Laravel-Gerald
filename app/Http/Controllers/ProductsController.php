<?php

namespace App\Http\Controllers;

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
}
