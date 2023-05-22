<div>
    <form action="{{$action}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($edit) @method('PUT') @endif
        {{$slot}}
        <div class="mb-3">
            <button type="submit" class="btn btn-outline-secondary">@if($edit) Update @else Save @endif</button>
        </div>
    </form>
</div>