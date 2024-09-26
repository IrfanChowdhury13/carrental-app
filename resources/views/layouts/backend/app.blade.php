<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.backend.includes.metas')
    <title>{{ config('app.name') }} | Dashboard</title>

    @include('layouts.backend.includes.styles')

</head>

<body class="hold-transition sidebar-mini layout-fixed">


    <div class="wrapper">

        @include('components.backend.nav')
        @include('layouts.backend.sidebar')





       


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
           
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024
                <a href="{{ route('home') }}">{{ config('app.name') }}</a>.</strong>
            All rights reserved.
           
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('layouts.backend.includes.scripts')
</body>

</html>
