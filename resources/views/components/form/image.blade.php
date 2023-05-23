<div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input class="form-control @error('image')) is-invalid @enderror" type="file" id="image" name="image">
    @error('image')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    <div class="mb-3 mt-3">
        <img src="@if($image) {{asset('storage/images/'.$image)}} @endif" alt="" srcset="" class="img-fluid border" style="width:250px" id="img-preview">
    </div>
    <!-- Preview old/uploaded image -->
    <script>
        const image = document.getElementById('image');
        image.onchange = evt => {
            preview = document.getElementById('img-preview');
            preview.style.display = 'block';
            const [file] = image.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
</div>