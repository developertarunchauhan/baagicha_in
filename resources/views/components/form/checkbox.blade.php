<div class="border p-2 rounded mb-3 @error('cat') border-danger @enderror">
    @foreach($list as $data)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="{{$data->id}}" id="cat" name="cat[]">
        <label class="form-check-label" for="cat">
            {{$data->title}}
        </label>
    </div>
    @endforeach
</div>
@error('cat')
<div class="text-danger">
    Atleast one cateogry is required.
</div>
@enderror