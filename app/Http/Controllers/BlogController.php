<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;
use App\Models\Category;
use App\Http\Traits\HandleFiles;

class BlogController extends Controller
{
    use HandleFiles;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with(['user', 'categories'])->get();
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
        $categories = Category::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        if (array_key_exists('image', $data)) {
            $data['image'] = $this->uploadImage($request);
        }
        $data['user_id'] = auth()->user()->id;
        $blog = Blog::create($data);
        $blog->categories()->attach($data['cat']);
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
        $categories = Category::all();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->validated();

        if (array_key_exists('image', $data)) {
            $this->deleteImage($blog->image);
            $data['image'] = $this->uploadImage($request);
        }
        $data['user_id'] = auth()->user()->id;
        $blog->update($data);
        $blog->categories()->sync($data['cat']);
        return redirect(route('blog.index'))->with('_update', 'Blog Updated');
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
        $image_path = '/public/images/' . $blog->image;
        if ($blog->forceDelete()) {
            Storage::delete($image_path);
        }
        return redirect(route('blog.trashed', 'trashed'))->with('_forceDelete', 'Blog Deleted permanently');
    }
    public function status(Blog $blog)
    {
        $blog->status = $blog->status === 'Published' ? 'Draft' : 'Published';
        $blog->save();
        return redirect(route('blog.index'))->with('_restore', 'Status Updated');
    }
}
