@extends('layouts.front.app')

@section('title')
{{__('Baagicha | Home page ')}}
@endsection

@section('content')


<!-- Hero Section Begins-->
<div class="container-fluid p-0 hero-container">
    <div class="hero">
        <div class="hero-inner bg-primary">
            <img src="https://placehold.co/1800x800" alt="" class="img-fluid">
        </div>
        <div class="hero-inner bg-primary">
            <img src="https://placehold.co/1800x800" alt="" class="img-fluid">
        </div>
        <div class="hero-inner bg-primary">
            <img src="https://placehold.co/1800x800" alt="" class="img-fluid">
        </div>
        <div class="hero-inner bg-primary">
            <img src="https://placehold.co/1800x800" alt="" class="img-fluid">
        </div>
        <div class="hero-inner bg-primary">
            <img src="https://placehold.co/1800x800" alt="" class="img-fluid">
        </div>
    </div>
    <div class="hero-products bg-light">
        <h1 class="text-center text-light">
            Featured products
        </h1>
    </div>
</div>
<!-- Hero Section Ends-->

<!-- Category Slider Begin-->
<div class="container-fluid bg-success p-5 mb-3">
    <h1 class="text-center text-white text-uppercase fw-light">Popular Categories</h1>
    <div class="slider m-3 d-flex justify-content-center align-items-stretch">
        @foreach($categories as $category)
        <div class="card border-0 rounded-0 m-1 shadow">
            <img src="{{asset('/storage/images/'.$category->image)}}" class="card-img-top rounded-0" alt="...">
            <div class="card-body p-1">
                <h5 class="card-title fs-6">{{$category->title}}</h5>
            </div>
            <a href="#" class="btn btn-info btn-block rounded-0 border-0" style="width:100%">Explore</a>
        </div>
        @endforeach
    </div>
</div>
<!-- Category Slider Begin-->
<!-- Category Product Box Begin-->
<div class="container-fluid">
    <h1 class="text-center text-uppercase fw-light">
        Popular Categories & Products
    </h1>
    <div class="row">
        @foreach($categories->slice(0,3) as $category)
        <div class="col-sm-4 mb-4">
            <div class="card rounded-0 border shadow-sm">
                <div class="card-body">
                    <h5 class="fs-5 fw-bold">{{$category->title}}</h5>
                    <div class="row">
                        @foreach($category->products->slice(0,4) as $product)
                        <div class="col-sm-6 g-1">
                            <img src="{{asset('/storage/images/'.$product->image)}}" class="card-img-top rounded-0" alt="...">
                            <a href="" class="text-reset fw-bold">{{Str::limit($product->title,40)}}</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Category Product Box Begin-->

<!-- Slider Ends-->
<!-- Category Slider Begin-->
<!-- <div class="container-fluid bg-success p-5 mb-3">
    <h1 class="text-center text-white text-uppercase fw-light">Popular Categories</h1>
    <div class="slider m-3 d-flex align-items-stretch">
        @foreach($categories as $category)
        <div class="card border-0 rounded-0 m-1 shadow">
            <img src="{{asset('/storage/images/'.$category->image)}}" class="card-img-top rounded-0" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$category->title}}</h5>
                <a href="#" class="btn btn-green btn-block rounded-0 border-0" style="width:100%">Explore</a>
            </div>
        </div>
        @endforeach
    </div>
</div> -->
<!-- Category Slider Begin-->
<!-- All Products Begin-->
<!-- <div class="container">
    <div class="row">
        <h1 class="text-center text-uppercase fw-light">Popular Products</h1>
        @foreach($products as $product)
        <x-product.card :product="$product" />
        @endforeach
        <div class="d-flex justify-content-center">
            {!! $products->links() !!}
        </div>
    </div>
</div> -->
<!-- All Products Ends-->
<!-- Featured Product Begin-->
<!-- <div class="container">
    <h1 class="text-center text-uppercase fw-light">Featured Products</h1>
    <div class="slider">
        @foreach($featured_products as $featured)
        <div class="card border-0 rounded-0 m-1 shadow">
            <img src="{{asset('/storage/images/'.$category->image)}}" class="card-img-top rounded-0" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$featured->title}}</h5>
                <a href="#" class="btn btn-green btn-block rounded-0 border-0" style="width:100%">View</a>
            </div>
        </div>
        @endforeach
    </div>
</div> -->
<!-- Featured Product Ends -->
<!-- Based on your history Begin-->
<!-- <div class="container bg-success p-5 mb-3">
    <h1 class="text-center text-white text-uppercase fw-light">Based upon your history</h1>
    <div class="slider m-3 d-flex align-items-stretch">
        @foreach($categories as $category)
        <div class="card border-0 rounded-0 m-1 shadow">
            <img src="{{asset('/storage/images/'.$category->image)}}" class="card-img-top rounded-0" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$category->title}}</h5>
                <a href="#" class="btn btn-green btn-block rounded-0 border-0" style="width:100%">Explore</a>
            </div>
        </div>
        @endforeach
    </div>
</div> -->
<!-- Based on your history Ends-->


@endsection