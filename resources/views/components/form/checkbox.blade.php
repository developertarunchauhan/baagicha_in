<div class="border p-2 rounded">
    @foreach($list as $data)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="{{$data->id}}" id="cat" name="cat[]">
        <label class="form-check-label" for="cat">
            {{$data->title}}
        </label>

    </div>
    @endforeach
</div>