<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:32',
            'description' => 'required|max:255',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->stock = $request->stock;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return redirect('/products');
    }


    // destroy
    public function destroy()
    {
        $product = Product::find(request('id'));
        $product->delete();
        return redirect('/products');
    }
    // edit product
    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', ['product' => $product]);
    }
    // update product
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:32',
            'description' => 'required|max:255',
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->stock = $request->stock;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return redirect('/products');
    }

    // show individual product

    public function show($id){
        $product = Product::find($id);
        return view('modal', compact('product'));

    }
}