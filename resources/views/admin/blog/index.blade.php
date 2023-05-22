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
                            <th>Deails</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <td style="width:80%">
                                {{$blog->title}}<br>
                                <a href="#" class="text-small text-reset">{{$blog->user->name}}</a><br>
                                <small>{{$blog->excrept}}</small>
                            </td>
                            <td><x-table.options :model="$blog" url="blog" /></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
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