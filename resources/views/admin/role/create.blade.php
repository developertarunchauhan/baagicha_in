@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <div class="card-header d-flex flex-row align-items-center justify-content-between ">
                <h3 class="card-title">Add</h3>
                <div class="btn-group">
                    <a class="btn btn-primary btn-sm" href="{{route('role.index')}}">
                        <i class="bi bi-list-columns-reverse"></i> View All
                    </a>
                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <!-- <li><a class="dropdown-item" href="{{route('role.index')}}"><i class="bi bi-list-columns-reverse"></i> View All</a></li> -->
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
                <form action="{{route('role.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="titleHelp" value="{{old('title')}}">
                        @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Comments</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" style="height: 100px" id="description" name="description">{{old('description')}}</textarea>
                        @error('description')
                        <div class="invalid-feedback"> {{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection