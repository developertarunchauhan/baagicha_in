@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="All Blog" url="blog" />
            <div class="card-body">
                <table id="myTable" class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <!-- <th>Image</th> -->
                            <th>Details</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <!-- <td style="width:15%">
                                <img src="{{asset('/storage/images/'.$blog->image)}}" alt="" srcset="" class="img-fluid">
                            </td> -->
                            <td>
                                {{$blog->title}}<br>
                                <small>
                                    @foreach($blog->categories as $category)<a href="#" class="border rounded bg-secondary text-light px-1" style="font-size:.7rem"> {{$category->title}}</a> @endforeach
                                    <br>
                                    <a href="#" class="text-reset text-muted">{{$blog->user->name}}</a> | {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
                                </small><br>
                                <small>{{$blog->excrept}}</small>
                            </td>
                            <td><x-table.options :model="$blog" url="blog" /></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <!-- <th>Image</th> -->
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