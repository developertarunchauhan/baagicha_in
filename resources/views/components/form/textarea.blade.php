<div class="mb-3">
    <label for="{{$title}}" class="form-label">{{str_replace('_',' ',ucfirst($title))}}</label>
    <textarea class="form-control @error($title) is-invalid @enderror" id="{{$title}}" rows="5" name="{{$title}}">{{$value}}</textarea>
    @error($title)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>