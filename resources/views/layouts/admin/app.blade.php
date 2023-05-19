@include('layouts.admin.partials.head');

<body>
    <div id="app">
        <!--Navbar Begin-->
        @include('layouts.admin.partials.navbar');
        <!--Navbar Ends-->
        <!-- Sidebar Begin-->
        @include('layouts.admin.partials.sidebar')
        <!-- Sidebar Ends-->
        <main class="py-4 mt-5">
            @yield('content')
        </main>

        @include('layouts.admin.partials.footer-scripts');
    </div>
</body>
@include('layouts.admin.partials.footer')