<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="easyHome Admin Area">
        <meta name="author" content="Jose">
        <title>easyHome Admin Area</title>
        <!-- Favicon -->
        <link rel="icon" href="{{url('assets/img/house.png')}}" type="image/png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
        <!-- Icons -->
        <link rel="stylesheet" href="{{url('admin_assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
        <link rel="stylesheet" href="{{url('admin_assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
        <!-- Page plugins -->
        <!-- Argon CSS -->
        <link rel="stylesheet" href="{{url('admin_assets/css/argon.css?v=1.2.0')}}" type="text/css">
    </head>
    <body>
        
        @yield('sidenav')

        
        @yield('contenido')
        
        <!-- Scripts -->
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="{{url('admin_assets/vendor/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{url('admin_assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('admin_assets/vendor/js-cookie/js.cookie.js')}}"></script>
        <script src="{{url('admin_assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{url('admin_assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
        <!-- Optional JS -->
        <script src="{{url('admin_assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
        <script src="{{url('admin_assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
        <!-- Argon JS -->
        <script src="{{url('admin_assets/js/argon.js?v=1.2.0')}}"></script>
        
        @yield('scripts')
        
    </body>

</html>