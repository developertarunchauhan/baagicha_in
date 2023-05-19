<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Baagicha') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- DataTables CSS-->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" /> -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <!-- Aanimate CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <!--Navbar Begin-->
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow fixed-top">
            <div class="container-fluid">
                <!-- Offcanvas Toggle Begin-->
                <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Offcanvas Toggle End-->
                <a class="navbar-brand me-auto" href="{{ url('/') }}">
                    {{ config('app.name', 'Baagicha') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi bi-person-bounding-box"></i> | {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!--Navbar Ends-->
        <!-- Offcanvas Menu Begin-->
        <div class="offcanvas offcanvas-start sidebar-nav bg-primary shadow" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-body">
                <nav class="navbar-dark">
                    <ul class="navbar-nav">
                        <li>
                            <div class="small fw-bold text-uppercase px-3 text-light">
                                Admin
                            </div>
                        </li>
                        <li>
                            <a href="{{route('home')}}" class="nav-link px-3 active">
                                <span class="me-2">
                                    <i class="bi bi-speedometer2"></i>
                                </span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="my-4">
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <div class="small fw-bold text-uppercase px-3 text-light">
                                Manager
                            </div>
                        </li>
                        <li>
                            <a class="nav-link sidebar-link px-3 text-light" data-bs-toggle="collapse" href="#accesscontrol" role="button" aria-expanded="false" aria-controls="accesscontrol">
                                <span class="me-2 fs-4"><i class="bi bi-sliders"></i></span>
                                <span>Access Manager</span>
                                <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="accesscontrol">
                                <div class="bg-primary">
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="{{route('role.index')}}" class="nav-link px-3 text-light">
                                                <span class="me-2">
                                                    <i class="bi bi-person-fill-exclamation"></i>
                                                </span>
                                                <span>Roles</span>
                                            </a>
                                            <a href="{{route('user.index')}}" class="nav-link px-3 text-light">
                                                <span class="me-2">
                                                    <i class="bi bi-people"></i>
                                                </span>
                                                <span>Users</span>
                                            </a>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a class="nav-link sidebar-link text-light px-3" data-bs-toggle="collapse" href="#postmanager" role="button" aria-expanded="false" aria-controls="postmanager">
                                <span class="me-2 fs-3"><i class="bi bi-blockquote-left"></i></span>
                                <span>Blog Manager</span>
                                <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
                            </a>
                            <div class="collapse" id="postmanager">
                                <div class="bg-primary text-light">
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                            <a href="#" class="nav-link px-3  text-light">
                                                <span class="me-2">
                                                    <i class="bi bi-speedometer2"></i>
                                                </span>
                                                <span>Nested Link</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Offcanvas menu Ends-->
        <main class="mt-5">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>

        <!-- jQuery Script Begin-->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <!-- jQuery Script Ends-->

        <!-- DataTable Scripts Begins-->
        <!-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

        <script>
            $(function() {
                $("#myTable").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": true,
                    "buttons": ["excel", "pdf", "print"]
                }).buttons().container().appendTo('#myTable_wrapper .col-md-6:eq(0)');
            });
        </script>

        <!-- DataTables Scripts Ends-->
    </div>
</body>

</html>