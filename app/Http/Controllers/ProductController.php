<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;

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
        $sells = DB::table('logs')->where('product_id', $id)->get();

        return view('edit', ['product' => $product], ['sells' => $sells]);
    }
    // update product
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:32',
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

    public function showInfo($id)
    {
        $product = Product::find($id);
        return view('modals/modal', compact('product'));

    }
    public function showAdd()
    {
        return view('modals/add');
    }
}