<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Traits\HandleFiles;

class CategoryController extends Controller
{
    use HandleFiles;

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
        if (array_key_exists('image', $data)) {
            $data['image'] = $this->uploadImage($request);
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
        $data = $request->validated();
        if (array_key_exists("image", $data)) {
            $this->deleteImage($category->image);
            $data['image'] = $this->uploadImage($request);
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
        $this->deleteImage($category->image);
        $category->forceDelete();
        return redirect(route('category.trashed', 'trashed'))->with('_forceDelete', 'Category Deleted Permanently');
    }
}
