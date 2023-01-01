<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller{

    public function index() {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect('/products');
    }
    // destroy
    public function destroy(){
        $product = Product::find(request('id'));
        $product->delete();
        return redirect('/products');
    }
    

}