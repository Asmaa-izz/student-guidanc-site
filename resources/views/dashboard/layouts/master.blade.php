<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('logo.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

    @include('dashboard.layouts.head')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    
</head>

@section('body')
@show

<body data-sidebar="dark">
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <div class="overlay"></div>
        <div class="spanner">
            <div class="loader"></div>
        </div>
        @include('dashboard.layouts.topbar')
        @include('dashboard.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('dashboard.layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('dashboard.layouts.rightSidebar')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    @include('dashboard.layouts.footerScript')
</body>

</html>
