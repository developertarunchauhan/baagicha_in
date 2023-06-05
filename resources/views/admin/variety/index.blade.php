@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="All Varieties" url="variety" />
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
                        @foreach($varieties as $variety)
                        <tr>
                            <td style="width:15%">
                                <img src="" alt="" srcset="" class=" img-fluid">
                            </td>
                            <td>
                                {{$variety->title}}<br>
                                <small>
                                    {{ Str::limit($variety->description, 100)}}
                                </small>
                            </td>
                            <td><x-table.options :model="$variety" url="variety" /></td>
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