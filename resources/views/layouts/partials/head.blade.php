<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard | ' . config('app.name'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">

    <!-- alertifyjs Css -->
    <link href="{{ asset('public/assets/libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- alertifyjs default themes  Css -->
    <link href="{{ asset('public/assets/libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Summernote css -->
    <link href="{{ asset('public/assets/libs/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />

    <!-- datepicker -->
    <link href="{{ URL::asset('public/assets/libs/air-datepicker/css/datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- jvectormap -->
    <link href="{{ URL::asset('public/assets/libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom Css-->
    <link href="{{ URL::asset('public/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ URL::asset('public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link
        href="{{ URL::asset('public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Page Spacific Styles -->
    @yield('styles')

</head>

