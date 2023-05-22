@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="Edit Role" add="{{route('role.create')}}" all="{{route('role.index')}}" trash="{{route('role.trashed','trashed')}}" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('role.update',$role)" :edit="true">
                    <x-form.title :value="$role->title" />
                    <x-form.description :value="$role->description" />
                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection