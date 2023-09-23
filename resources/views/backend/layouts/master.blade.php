<html lang="en" class="fontawesome-i2svg-active fontawesome-i2svg-complete">

@include('backend.layouts.head')

<body class="sb-nav-fixed">

    @include('backend.layouts.header')

    <div id="layoutSidenav">
        <!-- Sidebar -->
        @include('backend.layouts.sidebar')
        <!-- End of Sidebar -->

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('main-content')
                </div>
            </main>
            @include('backend.layouts.footer')

            @stack('scripts')
        </div>
    </div>

</body>

</html>
