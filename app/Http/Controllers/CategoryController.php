<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Display a listing of the resource.
     */
    public function trashed()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.category.trash', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        if ($request->file('image')->isValid()) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->storeAs('public/images', $image_name);
            $data['image'] = $image_name;
        }
        Category::create($data);
        return redirect(route('category.index'))->with('_store', 'New Category Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //return $request;
        $data = $request->validated();
        if ($request->file('image')->isValid()) {
            //IMPROVE THIS CODE IN SECOND ITERATION
            $old_image = $category->image;
            Storage::delete('/public/images/' . $old_image); // Deleting old image
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->storeAs('public/images', $image_name);
            $data['image'] = $image_name;
        }
        $category->update($data);
        return redirect(route('category.index'))->with('_update', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'))->with('_destroy', 'Category moved to trash');
    }

    /**
     * Restore resource from trash
     */

    public function restore(Category $category)
    {
        $category->restore();
        return redirect(route('category.trashed', 'trashed'))->with('_restore', 'Category restore');
    }
    /**
     * Permanently delete from trash
     */
    public function forceDelete(Category $category)
    {
        //return Storage::allFiles('/public/images/');
        //dd('/public/images' . $category->image);
        Storage::delete('/public/images/' . $category->image);
        $category->forceDelete();
        return redirect(route('category.trashed', 'trashed'))->with('_forceDelete', 'Category Deleted Permanently');
    }
}
