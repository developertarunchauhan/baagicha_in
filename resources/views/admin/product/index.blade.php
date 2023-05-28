@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="All Products" url="product" />
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
                        @foreach($products as $product)
                        <tr>
                            <td style="width:15%">
                                <img src="{{asset('/storage/images/'.$product->image)}}" alt="" srcset="" class="img-fluid">
                            </td>
                            <td>
                                {{$product->title}}<br>
                                <small>
                                    Categories :
                                    @foreach($product->categories as $category)
                                    <a href="#" class="text-reset">{{$category->title}}</a>
                                    @endforeach
                                </small><br>
                                <small>
                                    Subcategories :
                                    @foreach($product->subcategories as $subcategory)
                                    <a href="#" class="text-reset">{{$subcategory->title}}</a>
                                    @endforeach
                                </small><br>
                                <small>{{$product->description}}</small>
                            </td>
                            <td><x-table.options :model="$product" url="product" /></td>
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