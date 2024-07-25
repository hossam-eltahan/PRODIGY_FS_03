<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->


    <link rel="stylesheet" href="{{asset('admin/assets/modules/summernote/summernote-bs4.css')}}">
    {{--    search forms--}}
    <link rel="stylesheet" href="{{asset('admin/assets/modules/select2/dist/css/select2.min.css')}}">
    @yield('css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/components.css')}}">
    <link rel="stylesheet"
          href="{{asset('admin/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">

    <!-- Start GA -->
    <!-- data table -->

    <link rel="stylesheet" href="{{asset('admin/assets/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet"
          href="{{assert('admin/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('admin/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
    {{--code editor--}}
    <link rel="stylesheet" href="{{asset('admin/assets/modules/summernote/summernote-bs4.css')}}">
    {{--Tag Plugin--}}
    <link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>
