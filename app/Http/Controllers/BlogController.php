<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
        return redirect(route('blog.trash', 'trashed'))->with('_forceDelete', 'Blog Deleted permanently');
    }
}
