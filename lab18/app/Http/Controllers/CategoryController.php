<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Assuming you have a Category model

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories from the database
        return view('cat', ['categories' => $categories]);
    }
}
