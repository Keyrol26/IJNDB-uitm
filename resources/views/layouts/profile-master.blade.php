<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DownTime Database</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('multiple/img/ijn-logo/ijn-logo.png') }}" rel="icon">
    <link href="{{ asset('multiple/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('multiple/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('multiple/css/style.bundle.css" rel="stylesheet') }}" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!-- Vendor CSS Files -->
    <link href="{{ asset('multiple/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('multiple/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('multiple/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('multiple/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('multiple/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('multiple/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('multiple/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('multiple/css/style.css') }}" rel="stylesheet">

    

    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>

<body>

    @include('layouts.multiple.header')

    @include('layouts.multiple.sidebar')

    @yield('content')

    @include('layouts.multiple.footer')



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('multiple/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('multiple/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('multiple/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('multiple/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('multiple/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('multiple/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('multiple/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('multiple/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('multiple/js/main.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="{{ asset('multiple/js/plugins.bundle.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.8.2/countUp.min.js'></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

   
</body>

</html>
