<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" style="height: 100px" id="description" name="description" required>{{$value}}</textarea>
    @error('description')
    <div class="invalid-feedback"> {{$message}}</div>
    @enderror
</div>