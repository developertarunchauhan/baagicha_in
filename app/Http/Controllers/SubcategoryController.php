<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryRequest;
use Intervention\Image\Facades\Image as Image;

class SubcategoryController extends Controller
{
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
        //return $data;
        if ($request->file('image')->isValid()) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destination_path = public_path('storage/images/' . $image_name);
            Image::make($image)->resize(300, 300)->save($destination_path, 80); // image intervention
            //$request->image->storeAs('public/images', $image_name);
            $data['image'] = $image_name;
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
        $subcategory->delete();
        return redirect(route('subcategory.index'))->with('_destroy', 'Subcategory Moved to Trash');
    }
}
