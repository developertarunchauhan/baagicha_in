@include('layouts.admin.partials.head');

<body>
    <div id="app">
        <!--Navbar Begin-->
        @include('layouts.admin.partials.navbar');
        <!--Navbar Ends-->

        <main class="py-5 mt-5">
            <div class="container">
                <!-- Sidebar Begin-->
                @include('layouts.admin.partials.sidebar')
                <!-- Sidebar Ends-->
                <x-alerts.notification />
                @yield('content')
            </div>

        </main>

        @include('layouts.admin.partials.footer-scripts');
    </div>

</body>
@include('layouts.admin.partials.footer')