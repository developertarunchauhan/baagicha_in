@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="All Roles" url="role" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('role.store')" edit="">
                    <x-form.title :value="old('title')" />
                    <x-form.description :value="old('description')" />
                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection