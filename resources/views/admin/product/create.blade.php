@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12 col-xl-10">
        <div class="card shadow">
            <x-card.header title="Add Blog" url="blog" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('blog.store')" edit="">
                    <div class="row">
                        <div class="col-lg-8">
                            <x-form.title :value="old('title')" />
                            <x-form.description :value="old('description')" />
                            <div class="mb-3">
                                <label for="title" class="form-label">Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" aria-describedby="titleHelp" value="{{old('price')}}" required>
                                @error('price')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 border-lg-start">
                            <x-form.select :options=" ['In Stocks', 'Out Of Stock', 'Not Available', 'Available Soon']" :selected="old('select')" />
                            <x-form.checkbox :list="$categories" />
                            <x-form.checkbox :list="$subcategories" />
                            <x-form.image :image="false" />
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