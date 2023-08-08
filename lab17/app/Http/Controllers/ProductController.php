<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('show', compact('product'));
}
public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('products.index')->with('success', 'Product deleted successfully');
}



}
