<div class="mb-3">
    <label for="{{$title}}" class="form-label">{{str_replace('_',' ',ucfirst($title))}}</label>
    <textarea class="form-control" id="{{$title}}" rows="5" name="{{$title}}">{{$value}}</textarea>
</div>