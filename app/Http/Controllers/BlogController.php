<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('user')->get();
        //$blogs = Blog::all(); N+1 loading problem
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Display a listing of the trashed resource.
     */
    public function trashed()
    {
        $blogs = Blog::onlyTrashed()->get();
        return view('admin.blog.trash', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        if ($request->file('image')->isValid()) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destination_path = public_path('storage/images/' . $image_name);
            Image::make($image)->resize(300, 300)->save($destination_path, 80); // image intervention
            //$request->image->storeAs('public/images', $image_name);
            $data['image'] = $image_name;
        }
        $data['user_id'] = auth()->user()->id;

        Blog::create($data);
        return redirect(route('blog.index'))->with('_store', 'New Blog Saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect(route('blog.index'))->with('_destory', 'Blog Moved to Trash');
    }

    /**
     * Restores the specified resource from trash
     */
    public function restore(Blog $blog)
    {
        $blog->restore();
        return redirect(route('blog.trashed', 'trashed'))->with('_restore', 'Blog Restored');
    }

    /**
     * Permanently delete the resource from trash
     */

    public function forceDelete(Blog $blog)
    {
        $blog->forceDelete();
        return redirect(route('blog.trashed', 'trashed'))->with('_forceDelete', 'Blog Deleted permanently');
    }
}
