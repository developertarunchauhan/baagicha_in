@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="All Categories" url="category" />
            <div class="card-body">
                <table id="myTable" class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Details</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td style="width:15%">
                                <img src="{{asset('/storage/images/'.$category->image)}}" alt="" srcset="" class="img-fluid">
                            </td>
                            <td>
                                {{$category->title}}<br>
                                <small>{{ Str::limit($category->description, 100)}}</small>
                            </td>
                            <td><x-table.options :model="$category" url="category" /></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Details</th>
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