<div>
    @if($children)
    @foreach($children as $child)
    <div class="alert alert-success shadow d-flex justify-content-between" style="width:30vw; margin-left:{{$margin}}rem">
        {{$child->title}} Parent ID : {{$child->variety_id}} | OWN ID : {{$child->id}}
        <div>
            <a href="{{route('variety.edit',$child)}}" class="btn btn-outline-info btn-sm"><i class="bi bi-pencil"></i></a>
            <a href="#" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>
        </div>
    </div>
    <x-variety.child :children="$child->children" :margin="$margin + $loop->iteration" />
    @endforeach
    @endif
</div>