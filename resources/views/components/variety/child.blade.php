<div>
    @if($child)
    <ol>
        @foreach($child as $child_1)
        <li>{{$child_1->title}}({{$child_1->children->count()}}) [CHILD]</li>
        <x-variety.child :child="$child_1->children" />
        @endforeach
    </ol>
    @endif
</div>