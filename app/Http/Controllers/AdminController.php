<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        $categories = DB::table('products')->select(DB::raw('category'))->groupBy('category')->get();
        return view('admin.index', ['products'=>$products, 'categories'=>$categories]);
    }

    public function editProduct(Request $request)
    {
        $product = Product::find($request->productId);
        $categories = DB::table('products')->select(DB::raw('category'))->groupBy('category')->get();

        return view('admin.editProduct', ['product'=>$product, 'categories'=>$categories]);
    }

    public function editProductDB(Request $request)
    {
        $product = Product::find($request->productId);

        if ($request->productName) {
            $product->productName = $request->productName;
        }
        if ($request->price) {
            $product->price = $request->price;
        }
        if ($request->category) {
            $product->category = $request->category;
        }
        if ($request->image) {
            $product->image = $request->image;
        }
        if ($request->desc) {
            $product->desc = $request->desc;
        }
        $product->save();

        return redirect('/admin/product');
    }

    public function createProduct(Request $request)
    {
        $category = "";
        if ($request->newCategory) {
            $category = $request->newCategory;
        } else {
            $category = $request->existingCategory;
        }

        Product::create([
            'productName'=>$request->productName,
            'price'=>$request->price,
            'image'=>$request->image,
            'desc'=>$request->desc,
            'category'=>$category
        ]);

        return redirect('/admin/product');
    }

    public function deleteProduct(Request $request)
    {
        Product::destroy($request->productId);

        return redirect('/admin/product');
    }
}
