@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-xl-10">
        <div class="card shadow">
            <x-card.header title="Add Blog" url="blog" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('blog.update',$blog)" edit="true">
                    <div class="row">
                        <div class="col-lg-8">
                            <x-form.title :value="old('title',$blog->title)" />
                            <x-form.body :value="old('body',$blog->body)" />
                            <x-form.textarea title="excrept" :value="old('excrept',$blog->excrept)" />
                        </div>
                        <div class="col-lg-4 border-lg-start">
                            <x-form.select :options="['Published','Draft']" :selected="old('status',$blog->status)" />
                            <x-form.checkedbox :list="$categories" :checked="$blog->categories" />
                            <x-form.textarea title="meta_description" :value="old('meta_description',$blog->meta_description)" />
                            <x-form.textarea title="seo_title" :value="old('seo_title',$blog->seo_title)" />
                            <x-form.textarea title="tags" :value="old('tags',$blog->tags)" />
                            <x-form.image :image="$blog->image" />
                        </div>
                    </div>

                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
<!--
                'slug' => Str::slug($title, '-'),
-->