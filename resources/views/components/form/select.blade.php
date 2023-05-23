 <div class="mb-3">
     <label for="body" class="form-label">Body</label>
     <select class="form-select @error('status') is-invalid @enderror" aria-label=".form-select-sm example" id="status" name="status">
         <option selected value="">Select</option>
         @foreach($options as $option)
         <option value="{{$option}}" @if($selected===$option) selected @endif>{{$option}}</option>
         @endforeach
     </select>
     @error('status')
     <div class="invalid-feedback">
         {{$message}}
     </div>
     @enderror
 </div>