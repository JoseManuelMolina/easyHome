<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>easyHome</title>        
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="Jose">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="{{url('assets/img/house.png')}}">
        <link rel="apple-touch-icon" href="{{url('assets/img/apple-touch-icon.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{url('assets/img/apple-touch-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{url('assets/img/apple-touch-icon-114x114.png')}}">
        
        @yield('style')
    </head>
    <body id="topPage" data-spy="scroll" data-target=".navbar" data-offset="100">
        
        @yield('navbar')
        
        @yield('contenido')
        
        <!-- JQuery Core
        =====================================-->
        <script src="{{url('assets/js/core/jquery.min.js')}}"></script>
        <script src="{{url('assets/js/core/bootstrap-3.3.7.min.js')}}"></script>
        
        <!-- Magnific Popup
        =====================================-->
        <script src="{{url('assets/js/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{url('assets/js/magnific-popup/magnific-popup-zoom-gallery.js')}}"></script>
        
        <!-- JQuery Main
        =====================================-->
        <script src="{{url('assets/js/main/jquery.appear.js')}}"></script>
        <script src="{{url('assets/js/main/isotope.pkgd.min.js')}}"></script>
        <script src="{{url('assets/js/main/parallax.min.js')}}"></script>
        <script src="{{url('assets/js/main/jquery.countTo.js')}}"></script>
        <script src="{{url('assets/js/main/owl.carousel.min.js')}}"></script>
        <script src="{{url('assets/js/main/jquery.sticky.js')}}"></script>
        <script src="{{url('assets/js/main/ion.rangeSlider.min.js')}}"></script>
        <script src="{{url('assets/js/main/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{url('assets/js/main/main.js')}}"></script>
        @yield('scripts')
    </body>
</html>