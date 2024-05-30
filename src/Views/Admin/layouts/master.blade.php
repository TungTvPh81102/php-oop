<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title> @yield('title') | Admin & Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/images/favicon.ico">
    <!-- DataTables -->
    <link
        href="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link
        href="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/css/bootstrap.min.css" id="bootstrap-style"
        rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/css/icons.min.css" rel="stylesheet"
        type="text/css" />
    <!-- App Css-->
    <link href="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/css/app.min.css" id="app-style" rel="stylesheet"
        type="text/css" />
    <!-- App js -->

</head>

<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('layouts.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.side-bar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @yield('content')

            <!-- End Page-content -->

            @include('layouts.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    {{-- @include('layouts.rightbar') --}}
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- dashboard init -->
    <script src="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{ $_ENV['BASE_URL'] }}/public/assets/admin/assets/js/app.js"></script>


</body>


</html>
