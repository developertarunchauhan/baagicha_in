<div class="col-6 col-sm-4 col-lg-3 mb-3 d-flex align-items-stretch">
    <div class="card rounded-0 shadow">
        <img src="{{asset('/storage/images/'.$product->image)}}" class="card-img-top rounded-0" alt="...">
        <div class="card-body p-0 pt-2 d-flex align-items-between flex-column">
            @foreach($product->categories as $category)
            <a href="#" class="card-small px-3 text-reset fw-bolder">{{$category->title}}</a>
            @endforeach
            <h5 class="card-title px-3">{{Str::limit($product->title,30)}}</h5>
            <div class="btn-group btn-group-sm mt-auto" role="group" aria-label="Basic example" style="width:100%">
                <button type="button" class="btn btn-green rounded-0">Add to Card</button>
                <button type="button" class="btn btn-outline-green rounded-0">Buy Now</button>
            </div>
        </div>
    </div>
</div>