@include('admin._partials.header')
    @include('admin._partials.sidebar')
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <div class="container-fluid">
            @yield('content')
        </div>
        <!--/.container-fluid-->
    </main>
@include('admin._partials.footer')