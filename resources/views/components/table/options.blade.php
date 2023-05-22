<div>
    <form action="{{route($url.'.destroy', $model)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="btn-group" role="group" aria-label="Basic example">
            @if($model->status)
            <button type="button" class="btn @if($model->status === 'Published') btn-outline-success @else btn-outline-warning @endif btn-sm" data-bs-toggle="modal" data-bs-target="#status_{{$model->id}}">
                @if($model->status === 'Published') <i class="bi bi-toggle-on"></i> @else <i class="bi bi-toggle-off"></i> @endif
            </button>
            @endif
            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#edit_{{$model->id}}">
                <i class="bi bi-pencil"></i>
            </button>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_{{$model->id}}">
                <i class="bi bi-trash3-fill"></i>
            </button>
        </div>
        @if($model->status)
        <!-- Status Model Begin -->
        <div class="modal fade" id="status_{{$model->id}}" tabindex="-1" aria-labelledby="status_{{$model->id}}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="status_{{$model->id}}Label">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure to change "<span class="text-info fw-bold">{{$model->title}}</span>" status?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">No</button>
                        <a href="#" class="btn btn-outline-success btn-sm">Yes</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Status Model Ends -->
        <!-- Delete Model Begin -->
        <div class="modal fade" id="delete_{{$model->id}}" tabindex="-1" aria-labelledby="delete_{{$model->id}}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete_{{$model->id}}Label">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure to move "<span class="text-danger fw-bold">{{$model->title}}</span>" to trash ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-outline-danger btn-sm">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete Model Ends -->
        <!-- Edit Model Begin -->
        <div class="modal fade" id="edit_{{$model->id}}" tabindex="-1" aria-labelledby="edit_{{$model->id}}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_{{$model->id}}Label">Trash</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure to edit "<span class="text-secondary fw-bold">{{$model->title}}</span>" ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">No</button>
                        <a href="{{route($url.'.edit',$model)}}" class="btn btn-block btn-sm btn-outline-secondary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Model Ends -->
    </form>
</div>