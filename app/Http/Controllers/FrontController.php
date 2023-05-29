<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->paginate(20);
        return view('front.home.index', compact('products'));
    }
    public function blog()
    {
        return "blog";
    }
    public function shop()
    {
        return "shop";
    }
    public function about()
    {
        return "ABout";
    }
}
