@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <div class="card-header d-flex flex-row align-items-center justify-content-between ">
                <h3 class="card-title">Roles</h3>
                <div class="btn-group">
                    <a class="btn btn-primary btn-sm" href="{{route('role.create')}}">
                        <i class="bi bi-plus-circle"></i> Add
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
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>
                                <a href="{{route('role.show',$role)}}" class="text-reset">{{$role->title}}</a>
                            </td>
                            <td>{{$role->description}}</td>
                            <td>

                                <form action="{{route('role.destroy', $role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group" role="group" aria-label="Basic example" style="width:100%">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit_{{$role->id}}">
                                            <i class="bi bi-pencil"></i> Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_{{$role->id}}">
                                            <i class="bi bi-trash3-fill"></i> Trash
                                        </button>
                                    </div>
                                    <!-- Delete Model Begin -->
                                    <div class="modal fade" id="delete_{{$role->id}}" tabindex="-1" aria-labelledby="delete_{{$role->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete_{{$role->id}}Label">Edit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure to move "<span class="text-danger fw-bold">{{$role->title}}</span>"" to trash ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Model Ends -->
                                    <!-- Edit Model Begin -->
                                    <div class="modal fade" id="edit_{{$role->id}}" tabindex="-1" aria-labelledby="edit{{$role->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit_{{$role->id}}Label">Trash</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure to edit "<span class="text-warning fw-bold">{{$role->title}}</span>" ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">No</button>
                                                    <a href="{{route('role.edit',$role)}}" class="btn btn-block btn-sm btn-warning">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Model Ends -->
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection