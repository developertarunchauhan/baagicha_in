<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['categories', 'subcategories'])->get();
        return view('admin.product.index', compact('products'));
    }


    /**
     * Display a listing of the resource.
     */
    public function trashed()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.product.trash', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "HELLo";
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('_destory', 'Product moved to trash');
    }
    /**
     * Restore the specified resource from trash.
     */
    public function restore(Product $product)
    {
        $product->restore();
        return redirect(route('product.index'))->with('_restore', 'Product Restored');
    }
}
