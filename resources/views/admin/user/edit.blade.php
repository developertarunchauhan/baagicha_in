@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="Add User" url="user" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('user.update',$user)" :edit="true">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="nameHelp" value="{{old('name',$user->name)}}" required>
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp" value="{{old('email',$user->email)}}" disabled required>
                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="role_id">Role</label>
                        <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id">
                            <option value="">Select</option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}" @if($role->id === $user->role_id) selected @endif>{{$role->title}}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <!-- <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" aria-describedby="passwordlHelp">
                        @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation" aria-describedby="passwordHelp">
                        @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div> -->
                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection