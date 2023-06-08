@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <div class="card-header d-flex flex-row align-items-center justify-content-between ">
                <button class="btn btn-outline-secondary btn-sm">{{$exam->title}} | {{$exam->questions->count()}} Questionss</button>
                <div class="btn-group">
                    <a class="btn btn-outline-primary btn-sm" href="{{route('question.add_question', $exam)}}">
                        <i class="bi bi-plus-circle"></i> Add Question
                    </a>
                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('exam.index')}}"><i class="bi bi-table"></i> All</a></li>
                        <!-- <li><a class="dropdown-item" href="{{route('role.create')}}"><i class="bi bi-plus-circle"></i> Add</a></li> -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{route('exam.trashed','trashed')}}"><i class="bi bi-trash"></i> Trash</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                @foreach($exam->questions as $question)
                <div class="qna-box border mb-3 p-3 rounded">
                    <div class="que mb-2">
                        Q{{$loop->iteration}}. {{$question->question}}
                    </div>
                    <div class="ans mb-1">
                        <ol>
                            @foreach($question->answers as $answer)
                            <li>{{$answer->answer}} @if($answer->is_correct)<sup class="border border-2 border-success rounded px-1 py-0 fw-bold">correct</sup>@endif </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection