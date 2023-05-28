@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="All Subcategories" url="subcategory" />
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
                        @foreach($subcategories as $subcategory)
                        <tr>
                            <td style="width:15%">
                                <img src="{{asset('/storage/images/'.$subcategory->image)}}" alt="" srcset="" class="img-fluid">
                            </td>
                            <td>
                                {{$subcategory->title}}<br>
                                <small>
                                    @foreach($subcategory->categories as $category)
                                    <a href="" class="text-reset bg-info rounded px-2">{{$category->title}}</a>
                                    @endforeach <br>
                                    {{ Str::limit($subcategory->description, 100)}}
                                </small>
                            </td>
                            <td><x-table.options :model="$subcategory" url="subcategory" /></td>
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