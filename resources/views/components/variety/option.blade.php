<div>
    @if($children)
    @foreach($children as $child)
    <option value="{{$child->id}}">@for($i=0 ; $i <$margin ; $i++) - @endfor {{$child->title}}</option>
            @if($child->children)
            <x-variety.option :children="$child->children" :margin="$margin  + $loop->iteration" />
            @endif
            @endforeach
            @endif
</div>