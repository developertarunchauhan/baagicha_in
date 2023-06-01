<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;
use App\Http\Traits\HandleFiles;

class SubcategoryController extends Controller
{
    use HandleFiles;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::with(['categories'])->get();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Display a listing of the trashed resource.
     */
    public function trashed()
    {
        $subcategories = Subcategory::onlyTrashed()->get();
        return view('admin.subcategory.trash', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubcategoryRequest $request)
    {
        $data = $request->validated();
        if (array_key_exists('image', $data)) {
            $data['image'] = $this->uploadImage($request);
        }
        $subcategory = Subcategory::create($data);

        $subcategory->categories()->attach($data['cat']);

        return redirect(route('subcategory.index'))->with('_store', 'New Subcategory Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubcategoryRequest $request, Subcategory $subcategory)
    {
        $data = $request->validated();
        //return $data;
        if (array_key_exists("image", $data)) {
            $this->deleteImage($subcategory->image);
            $data['image'] = $this->uploadImage($request);
        }

        $subcategory->update($data);

        $subcategory->categories()->sync($data['cat']);
        return redirect(route('subcategory.index'))->with('_update', 'Subcategory Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect(route('subcategory.index'))->with('_destroy', 'Subcategory Moved to Trash');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function restore(Subcategory $subcategory)
    {
        $subcategory->restore();
        return redirect()->back()->with('_restore', 'Subcategory Restored');
    }

    /**
     * Permanently Remove the specified resource from storage.
     */
    public function forceDelete(Subcategory $subcategory)
    {
        $image_path = '/public/images/' . $subcategory->image;
        $categories = $subcategory->categories;
        if ($subcategory->forceDelete()) {
            Storage::delete($image_path);
            $subcategory->categories()->detach($categories);
        }

        return redirect(route('subcategory.index'))->with('_destroy', 'Subcategory Moved to Trash');
    }
}
