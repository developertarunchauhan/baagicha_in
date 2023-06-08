@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="Assign Exam" url="exam" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('exam.assignexam')" edit="">
                    <div class="mb-3">
                        <label for="exam_id" class="form-label">Exam</label>
                        <select class="form-select" aria-label="Select Exam" id="exam_id" name="exam_id">
                            <option value="{{$exam->id}}" selected>{{$exam->title}}</option>
                        </select>
                    </div>
                    <div class="border p-2 rounded mb-3 @error('users.*') border-danger @enderror">
                        @foreach($users as $user)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$user->id}}" id="user" name="users[]" @if($exam->users) @foreach($exam->users as $u) @if($user->id === $u->id) checked @endif @endforeach @endif>
                            <label class="form-check-label" for="user">
                                {{$user->name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @error('users.*')
                    <div class="text-danger">
                        Atleast one cateogry is required.
                    </div>
                    @enderror
                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection