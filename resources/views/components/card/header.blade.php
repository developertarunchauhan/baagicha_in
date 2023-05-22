<div class="card-header d-flex flex-row align-items-center justify-content-between ">
    <button class="btn btn-outline-secondary btn-sm">{{$title}}</button>
    <div class="btn-group">
        <a class="btn btn-outline-primary btn-sm" href="{{route($url.'.create')}}">
            <i class="bi bi-plus-circle"></i>
        </a>
        <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route($url.'.index')}}"><i class="bi bi-table"></i> All</a></li>
            <!-- <li><a class="dropdown-item" href="{{route('role.create')}}"><i class="bi bi-plus-circle"></i> Add</a></li> -->
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{route($url.'.trashed','trashed')}}"><i class="bi bi-trash"></i> Trash</a></li>
        </ul>
    </div>
</div>