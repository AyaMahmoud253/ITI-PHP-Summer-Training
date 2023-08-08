<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category; // Assuming you have a Category model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('cat', compact('categories'));
    }
    public function show(Category $category)
    {
        // Retrieve products related to the specified category
        $products = $category->products;

        // Pass the category and its related products to the view
        return view('show2', compact('category', 'products'));
    }
    public function create()
    {
        return view('add'); // Replace 'create_category' with the name of your view file.
    }
    public function edit(Category $category)
    {
        if (Gate::denies('update', $category)) {
            abort(403, 'Unauthorized action.');
        }
    
        return view('edit_category', compact('category'));
    
    }
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validatedData);

        // Redirect to a relevant page after successful category update
        return redirect()->route('cat')->with('success', 'Category updated successfully.');
    }
    // Store the category data in the database
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Create the category in the database
    $category = Category::create([
        'name' => $validatedData['name'],
        'creator_id' => auth()->id(),
    ]);
   
    // Redirect to a relevant page after successful category creation
    return redirect()->route('cat')->with('success', 'Category created successfully.');
}
public function destroy(Category $category)
{
    if (Gate::denies('delete', $category)) {
        abort(403, 'Unauthorized action.');
    }

    $category->delete();

    return redirect()->route('cat')->with('success', 'Category deleted successfully.');
}
    

    
    
}
