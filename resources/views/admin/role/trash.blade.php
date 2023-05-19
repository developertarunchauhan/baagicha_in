@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <div class="card-header d-flex flex-row align-items-center justify-content-between ">
                <h3 class="card-title">Trashed Roles</h3>
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
                            <td>{{$role->title}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                                <form action="{{route('role.forceDelete', $role)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group" role="group" aria-label="Basic example" style="width:90%">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#restore_{{$role->id}}">
                                            <i class="bi bi-recycle"></i> Restore
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#destroy_{{$role->id}}">
                                            <i class="bi bi-trash"></i> Destroy
                                        </button>
                                    </div>
                                    <!-- Force Delete Model Start-->
                                    <div class="modal fade" id="destroy_{{$role->id}}" tabindex="-1" aria-labelledby="destroy_{{$role->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="destroy_{{$role->id}}Label">Destory</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-danger">
                                                    Are you sure to permanently delete "<span class="fw-bold">{{$role->title}}</span>" ? <br>
                                                    Once deleted from trash , it can't be restored.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Destroy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Force Delete Model Ends-->
                                    <!-- Restore Model Begin-->
                                    <div class="modal fade" id="restore_{{$role->id}}" tabindex="-1" aria-labelledby="restore_{{$role->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="restore_{{$role->id}}Label">Restore</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure to restore "<span class="text-primary fw-bold">{{$role->title}}</span>"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="{{route('role.restore',$role)}}" class="btn btn-primary">Restore</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Restore Model Ends -->
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