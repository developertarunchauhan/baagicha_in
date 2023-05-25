@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="Add Subcategory" url="subcategory" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('subcategory.update',$subcategory)" edit="true">
                    <x-form.title :value="old('title',$subcategory->title)" />
                    <x-form.description :value="old('description',$subcategory->description)" />
                    <x-form.checkedbox :list="$categories" :checked="$subcategory->categories" />
                    <x-form.image :image="$subcategory->image" />
                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection