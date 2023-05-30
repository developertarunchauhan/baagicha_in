<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->paginate(4);
        $categories = Category::with('products')->get();
        $featured_products = Product::with('categories')->inRandomOrder()->limit(5)->get();
        return view('front.home.index', compact('products', 'categories', 'featured_products'));
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
