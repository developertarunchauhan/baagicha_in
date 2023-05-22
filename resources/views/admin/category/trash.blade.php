@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="Trashed Category" url="category" />
            <!-- /.card-header -->
            <div class="card-body">
                <table id="myTable" class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->title}}</td>
                            <td>{{Str::limit($category->description,50)}}</td>
                            <td>
                                <x-table.trash-option :model="$category" url="category" />
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