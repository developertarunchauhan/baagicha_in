@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="Add Exam" url="exam" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('exam.store')" edit="">
                    <x-form.title :value="old('title')" />
                    <x-form.description :value="old('description')" />
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" id="add_question" name="add_question">
                            <label class="form-check-label" for="add_question">
                                Add Questions
                            </label>
                        </div>
                    </div>
                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection