<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function __construct()
    {
        // Apply the 'auth' middleware to all resource routes except 'index' and 'show'
        $this->middleware('auth');
    }

    // ProductController.php

public function index()
{
    $products = Product::with('category')->get();
    $categories = Category::with('products')->get();
    return view('products', compact('products', 'categories'));
}

    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('show', compact('product'));
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $this->authorize('delete', $product);
    if ($product->image) {
        $imagePath = public_path('images/' . $product->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Delete the image file from the server
    if ($product->image) {
        Storage::delete('public/images/' . $product->image);
    }

    // Delete the product from the database
    $product->delete();

    return redirect()->route('products')->with('success', 'Product deleted successfully');
}


public function store(Request $request)
{
    
    
    // Upload and store the image
    $file_name = time() . '.' . $request->image->getClientOriginalExtension();
    $request->image->move(public_path('images'), $file_name);

    // Create and save the new product
    $product = new Product();
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->image = $file_name;
    $product->price = $request->input('price');
    $product->category_id = $request->input('category_id'); // Set the category_id from the form
    // Set the creator_id to the authenticated user's ID
    $product->creator_id = auth()->id();
    $product->save();

    return redirect()->route('products')->with('success', 'Product added successfully');
}

public function edit($id)
    {
        // Find the product by its ID or throw a 404 exception if not found
        $product = Product::findOrFail($id);

        // Authorize the update action
        $this->authorize('update', $product);

        return view('editproduct', compact('product'));
    }



public function update(Request $request, $id)
    {
        // Find the product by its ID or throw a 404 exception if not found
        $product = Product::findOrFail($id);

        // Authorize the update action
        $this->authorize('update', $product);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|between:0,9999.99',
        ]);

        // Delete the old image if a new one is uploaded
        if ($request->hasFile('image') && $product->image) {
            $imagePath = public_path('images/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Handle the image upload (if a new one is uploaded)
        if ($request->hasFile('image')) {
            $file_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $file_name);
            $product->image = $file_name;
        }

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        // Save the updated product
        $product->save();

        return redirect()->route('products')->with('success', 'Product updated successfully');
    }



}
