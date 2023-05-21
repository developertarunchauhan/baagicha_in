<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="titleHelp" value="{{$value}}">
    @error('title')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>