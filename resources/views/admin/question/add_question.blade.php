@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="Add Questions for '{{$exam->title}}' Exam" url="question" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('question.store')" edit="">
                    <div class="mb-3">
                        <label for="exam_id" class="form-label">Exam</label>
                        <select class="form-select" aria-label="Select Exam" id="exam_id" name="exam_id">
                            <option value="{{$exam->id}}" selected>{{$exam->title}}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="question" class="form-label">Question</label>
                        <textarea class="form-control @error('question') is-invalid @enderror" id="question" rows="5" name="question">{{old('question')}}</textarea>
                        @error('question')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <hr>
                    <div class="answers">
                        <?php for ($i = 0; $i < 4; $i++) { ?>

                            <div class="answers-box border-bottom border-primary py-3 mb-3">
                                <div class="mb-3">
                                    <label for="question" class="form-label">Answer {{$i+1}}</label>
                                    <textarea class="form-control @error('answers.*') is-invalid @enderror" id="answer_{{$i+1}}" rows="2" name="answers[]">{{old('answers[]')}}</textarea>
                                    @error('answers.*')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('correct_answers.*') is-invalid @enderror" type="checkbox" value="{{$i}}" id="correct_answer_{{$i+1}}" name="correct_answers[]">
                                    <label class="form-check-label" for="correct_answer_{{$i+1}}">
                                        Is Correct Answer
                                    </label>
                                    @error('correct_answers.*')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <a href="#" class="btn btn-sm btn-outline-success">Add more answers (Max:7)</a>
                    </div>
                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection