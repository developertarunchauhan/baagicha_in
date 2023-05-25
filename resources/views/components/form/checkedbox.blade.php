<div class="border p-2 rounded @error('cat') border-danger @enderror">
    @foreach($list as $data)
    <div class="form-check">
        <input class="form-check-input " type="checkbox" value="{{$data->id}}" id="cat" name="cat[]" @if($checked) @foreach($checked as $check) @if($data->id === $check->id) checked @endif @endforeach @endif>
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