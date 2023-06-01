@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="All Users" url="user" />
            <div class="card-body">
                <table id="myTable" class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</sth>
                            <th>Details</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td><span class="{{$user->role->rolecolor}} text-light px-1 rounded text-small">@if($user->role->title) {{$user->role->title}} @else Guest @endif</span></td>
                            <td>{{$user->name}} <br>
                                {{$user->email}}<br>
                                <small>{{$user->handle}}</small>
                            </td>
                            <td><x-table.options :model="$user" url="user" /></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
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