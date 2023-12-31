<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('adminBackend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('adminBackend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminBackend/assets/plugins/datetimepicker/css/classic.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminBackend/assets/plugins/datetimepicker/css/classic.time.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminBackend/assets/plugins/datetimepicker/css/classic.date.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminBackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link
        href="{{ asset('adminBackend/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('adminBackend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminBackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('adminBackend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('adminBackend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('adminBackend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminBackend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminBackend/assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('adminBackend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('adminBackend/assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('adminBackend/assets/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css">
    <title>Admin Dashboard</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('admin.body.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @include('admin.body.header')
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            @yield('admin')
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include('admin.body.footer')
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('adminBackend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('adminBackend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/jquery-knob/excanvas.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/datetimepicker/js/legacy.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/datetimepicker/js/picker.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/datetimepicker/js/picker.time.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/datetimepicker/js/picker.date.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js') }}"></script>
    <script
        src="{{ asset('adminBackend/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}">
    </script>
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
    <script src="{{ asset('adminBackend/assets/js/index.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('adminBackend/assets/js/app.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
</body>

</html>
