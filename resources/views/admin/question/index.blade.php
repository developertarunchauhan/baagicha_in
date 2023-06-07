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
                            <th>#</th>
                            <th>Details</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                {{$question->question}}<br>
                                <div class="row">
                                    @foreach($question->answers as $answer)
                                    <div class="col-12 border-bottom">
                                        <b @if($answer->is_correct) class="text-light bg-success rounded px-1" @endif>{{$loop->iteration}}</b>.
                                        {{$answer->answer}}
                                    </div>
                                    @endforeach
                                </div>
                            </td>
                            <td><x-table.options :model="$question" url="question" /></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
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