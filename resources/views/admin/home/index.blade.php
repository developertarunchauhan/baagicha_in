@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-3 col-md-6 mb-3 animate__animated animate__bounce">
        <div class="card border border-top-0 border-end-0 border-bottom-0 border-primary border-5 shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutter align-items-center">
                    <div class="col ms-2">
                        <div class="fs-6 fw-normal text-primary text-uppercase mb-1">
                            Roles
                        </div>
                        <div class="fs-5 mb-0 fw-bold">
                            {{App\Models\Role::all()->count()}}
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
                            Users
                        </div>
                        <div class="fs-5 mb-0 fw-bold">
                            {{App\Models\User::all()->count()}}
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
                            Blog Category
                        </div>
                        <div class="fs-5 mb-0 fw-bold">
                            {{App\Models\Category::all()->count()}}
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
</div>
@endsection