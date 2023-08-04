<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'Product 1', 'price' => 10.99],
            ['id' => 2, 'name' => 'Product 2', 'price' => 20.49],
            ['id' => 3, 'name' => 'Product 3', 'price' => 15.00],
           
        ];

        return view('products', ['products' => $products]);
    }
}
