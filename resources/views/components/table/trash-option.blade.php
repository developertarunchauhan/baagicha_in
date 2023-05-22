<div>
    <form action="{{route('role.forceDelete', $model)}}" method="post">
        @csrf
        @method('DELETE')
        <div class="btn-group" role="group" aria-label="Basic example" style="width:100%">
            <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#restore_{{$model->id}}">
                <i class="bi bi-recycle"></i> Restore
            </button>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#destroy_{{$model->id}}">
                <i class="bi bi-trash"></i> Destroy
            </button>
        </div>
        <!-- Force Delete Model Start-->
        <div class="modal fade" id="destroy_{{$model->id}}" tabindex="-1" aria-labelledby="destroy_{{$model->id}}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="destroy_{{$model->id}}Label">Destory</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-danger">
                        Are you sure to permanently delete "<span class="fw-bold">{{$model->title}}</span>" ? <br>
                        Once deleted from trash , it can't be restored.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-danger">Destroy</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Force Delete Model Ends-->
        <!-- Restore Model Begin-->
        <div class="modal fade" id="restore_{{$model->id}}" tabindex="-1" aria-labelledby="restore_{{$model->id}}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="restore_{{$model->id}}Label">Restore</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure to restore "<span class="text-success fw-bold">{{$model->title}}</span>"?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="{{route('role.restore',$model)}}" class="btn btn-outline-success">Restore</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Restore Model Ends -->
    </form>
</div>