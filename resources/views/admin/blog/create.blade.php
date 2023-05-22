@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="Add Blog" url="blog" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('blog.store')" edit="">
                    <x-form.title :value="old('title')" />
                    <div class="mb-3">
                        <label for="excrept" class="form-label">Excrept</label>
                        <textarea class="form-control" id="body" rows="5" name="excrept"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea class="form-control" id="body" rows="40" name="body"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <textarea class="form-control" id="tags" rows="3" name="tags"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control" id="meta_description" rows="3" name="meta_description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="seo_title" class="form-label">SEO Title</label>
                        <textarea class="form-control" id="seo_title" rows="3" name="seo_title"></textarea>
                    </div>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="status" name="status">
                        <option selected>Select</option>
                        <option value="Published">Published</option>
                        <option value="Draft">Draft</option>
                    </select>
                    <x-form.image />
                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
<!--
                'slug' => Str::slug($title, '-'),
                'category_id'
-->