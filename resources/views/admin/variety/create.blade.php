@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="Add Category" url="category" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('variety.store')" edit="">
                    <x-form.title :value="old('title')" />
                    <x-form.description :value="old('description')" />
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="variety_id">Parent Cateogory</label>
                            <select class="form-control @error('variety_id') is-invalid @enderror" id="variety_id" name="variety_id">
                                <option value="0" selected>Select</option>
                                @foreach($varieties as $variety)
                                <option value="{{$variety->id}}">{{$variety->title}}</option>
                                @if($variety->children)
                                @foreach($variety->children as $child)
                                <option value="{{$child->id}}"> -- {{$child->title}}</option>
                                @endforeach
                                @endif
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection