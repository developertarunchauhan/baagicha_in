@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-11">
        <div class="card shadow">
            <div class="card-header d-flex flex-row align-items-center justify-content-between ">
                <h3 class="card-title fs-6">Edit</h3>
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm" type="button">
                        Menu
                    </button>
                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('role.index')}}"><i class="bi bi-list-columns-reverse"></i> View All</a></li>
                        <li><a class="dropdown-item" href="{{route('role.create')}}"><i class="bi bi-plus-circle"></i> Add</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{route('role.trashed','trashed')}}"><i class="bi bi-trash"></i> Trash</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('role.update',$role)" :edit="true">
                    <x-form.title :value="$role->title" />
                    <x-form.description :value="$role->description" />
                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection