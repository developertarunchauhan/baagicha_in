@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="Edit Category" url="category" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('category.update',$category)" :edit="true">
                    <x-form.title :value="$category->title" />
                    <x-form.description :value="$category->description" />
                    <x-form.image :image="$category->image" />
                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection