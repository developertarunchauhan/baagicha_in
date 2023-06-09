@extends('layouts.admin.app')

@section('content')
<!-- <div class="row justify-content-center">
    <div class="col-xl-3 col-md-6 mb-3 animate__animated animate__bounce">
        <div class="card border border-top-0 border-end-0 border-bottom-0 border-primary border-5 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutter align-items-center">
                    <div class="col ms-2">
                        <div class="fs-6 fw-normal text-primary text-uppercase mb-1">
                            Assigned Exams
                        </div>
                        <div class="fs-5 mb-0 fw-bold">

                        </div>
                    </div>
                    <div class="col-auto fs-3 fw-bolder">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3 animate__animated animate__bounce">
        <div class="card border border-top-0 border-end-0 border-bottom-0 border-warning border-5 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutter align-items-center">
                    <div class="col ms-2">
                        <div class="fs-6 fw-normal text-primary text-uppercase mb-1">
                            Exam's Given
                        </div>
                        <div class="fs-5 mb-0 fw-bold">
                            0
                        </div>
                    </div>
                    <div class="col-auto fs-3 fw-bolder">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3 animate__animated animate__bounce">
        <div class="card border border-top-0 border-end-0 border-bottom-0 border-info border-5 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutter align-items-center">
                    <div class="col ms-2">
                        <div class="fs-6 fw-normal text-primary text-uppercase mb-1">
                            Attemped out of assigned
                        </div>
                        <div class="fs-5 mb-0 fw-bold">
                            12
                        </div>
                    </div>
                    <div class="col-auto fs-3 fw-bolder">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-3 animate__animated animate__bounce">
        <div class="card border border-top-0 border-end-0 border-bottom-0 border-success border-5 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutter align-items-center">
                    <div class="col ms-2">
                        <div class="fs-6 fw-normal text-primary text-uppercase mb-1">
                            Blog
                        </div>
                        <div class="fs-5 mb-0 fw-bold">
                            {{App\Models\Blog::all()->count()}}
                        </div>
                    </div>
                    <div class="col-auto fs-3 fw-bolder">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="row d-flex justify-content-center">
    <div class="col-sm-12">
        <div class="card shadow">
            <div class="card-header">
                Exams Assigned to you
            </div>
            <div class="card-body">
                @if($isExamAssignedToUser)
                @foreach($examsByUser as $exam)
                <div class="exam-box border rounded mb-3 p-2">

                    Exam : {{$exam->title}} <br>
                    Description : {{$exam->description}} <br>
                    Questions : {{$exam->questions->count()}}<br>
                    @if(!in_array($exam->id, $completedExamsByUser))
                    <a href="{{route('quiz.take_quiz',$exam)}}" class="btn btn-outline-success btn-sm">Take Exam</a>
                    @else
                    <a href="{{route('quiz.view_result',$exam->id)}}" class="btn btn-outline-info btn-sm">View Result</a>
                    @endif
                </div>
                @endforeach
                @else
                No Exams are assigned to you right now
                @endif
            </div>
        </div>
    </div>
</div>
@endsection