@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="All Exams" url="exam" />
            <div class="card-body">
                <table id="myTable" class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Details</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exams as $exam)
                        <tr>
                            <td>
                                {{$exam->title}}<br>
                                <small>
                                    Total Questions : {{$exam->questions->count()}}<br>
                                    Assigned to : {{$exam->users->count()}}
                                    <br>
                                    {{ Str::limit($exam->description, 100)}}
                                </small>
                            </td>
                            <td>
                                <div>
                                    <form action="{{route('exam.destroy', $exam)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{route('exam.assign', $exam)}}" class="btn btn-outline-success btn-sm"> <i class="bi bi-pen-fill"></i> Assign</a>
                                            <a href="{{route('question.add_question', $exam)}}" class="btn btn-outline-warning btn-sm"> <i class="bi bi-plus-square"></i> Add Questions</a>
                                            <a href="{{route('exam.show',$exam)}}" class="btn btn-outline-info btn-sm"><i class="bi bi-eye"></i> View</a>
                                            @if($exam->status)
                                            <button type="button" class="btn @if($exam->status === 'Published') btn-outline-success @else btn-outline-warning @endif btn-sm" data-bs-toggle="modal" data-bs-target="#status_{{$exam->id}}">
                                                @if($exam->status === 'Published') <i class="bi bi-toggle-on"></i> @else <i class="bi bi-toggle-off"></i> @endif
                                            </button>
                                            @endif
                                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#edit_{{$exam->id}}">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_{{$exam->id}}">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @if($exam->status)
                        <!-- Status Model Begin -->
                        <div class="modal fade" id="status_{{$exam->id}}" tabindex="-1" aria-labelledby="status_{{$exam->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="status_{{$exam->id}}Label">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to change "<span class="text-info fw-bold">{{$exam->title}}</span>" status?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">No</button>
                                        <a href="{{route('exam.status',$exam)}}" class="btn btn-outline-success btn-sm">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- Status Model Ends -->
                        <!-- Delete Model Begin -->
                        <div class="modal fade" id="delete_{{$exam->id}}" tabindex="-1" aria-labelledby="delete_{{$exam->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="delete_{{$exam->id}}Label">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to move "<span class="text-danger fw-bold">{{$exam->title}}</span>" to trash ?
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
                        <div class="modal fade" id="edit_{{$exam->id}}" tabindex="-1" aria-labelledby="edit_{{$exam->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="edit_{{$exam->id}}Label">Trash</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to edit "<span class="text-secondary fw-bold">{{$exam->title}}</span>" ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">No</button>
                                        <a href="{{route('exam.edit',$exam)}}" class="btn btn-block btn-sm btn-outline-secondary">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Model Ends -->
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Details</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection