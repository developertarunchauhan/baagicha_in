<div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input class="form-control @error('image')) is-invalid @enderror" type="file" id="image" name="image">
    @error('image')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>