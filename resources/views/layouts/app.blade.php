@extends('layouts.base')

@section('style')
        <!-- Load Core CSS 
        =====================================-->
        <link rel="stylesheet" href="{{url('assets/css/core/bootstrap-3.3.7.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/css/core/animate.min.css')}}">
        
        <!-- Load Main CSS 
        =====================================-->
        <link rel="stylesheet" href="{{ url('assets/css/main/main.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/main/setting.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/main/hover.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/main/cover.css') }}">
        
        <link rel="stylesheet" href="{{ url('assets/css/range-slider/ion.rangeSlider.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/range-slider/ion.rangeSlider.skinFlat.css') }}">
        
        <!-- Load Magnific Popup CSS 
        =====================================-->
        <link rel="stylesheet" href="{{ url('assets/css/magnific/magic.min.css') }}">        
        <link rel="stylesheet" href="{{ url('assets/css/magnific/magnific-popup.css') }}">              
        <link rel="stylesheet" href="{{ url('assets/css/magnific/magnific-popup-zoom-gallery.css') }}">
        
        <!-- Load OWL Carousel CSS 
        =====================================-->
        <link rel="stylesheet" href="{{ url('assets/css/owl-carousel/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/owl-carousel/owl.theme.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/owl-carousel/owl.transitions.css') }}">
        
        <!-- Load Color CSS - Please uncomment to apply the color.
        =====================================-->
        <link rel="stylesheet" href="{{ url('assets/css/color/bw.css') }}">
        
        <!-- Load Fontbase Icons - Please Uncomment to use linea icons
        =====================================--> 
        <link rel="stylesheet" href="{{ url('assets/css/icon/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/icon/et-line-font.css') }}">
@endsection

@section('navbar')
<nav class="navbar navbar-pasific navbar-mp navbar-standart megamenu navbar-fixed-top" style="border-bottom:1px solid #fff;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="{{ url('/') }}">
                        <img src="{{ url( 'assets/img/house.png' )}}" alt="logo" style="height:200%">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
        
                <div class="navbar-collapse collapse navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown megamenu-fw has-dropdown-menu"><a href="{{ url('/') }}" class="dropdown-toggle color-light">Inicio</a></li>
                        <li class="dropdown megamenu-fw"><a href="{{ route('user.show') }}" class="dropdown-toggle color-light">Perfil</a></li>
                        @if(Auth::check())
                            @if(Auth::user()->rol == 'admin')
                                <li class="dropdown megamenu-fw"><a href="{{ route('admin.index') }}" class="dropdown-toggle color-light">Zona de Administración</a></li>
                            @endif
                            <li class="dropdown megamenu-fw"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                            class="dropdown-toggle color-light">Cerrar Sesion</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            
                        @endif
                        
                        @if(!Auth::check())
                            <li class="dropdown"><a href="{{ route('login') }}" class="dropdown-toggle color-light">{{ __('Iniciar Sesion') }}</a></li>
                            <li class="dropdown"><a href="{{ route('register') }}" class="dropdown-toggle color-light">{{ __('Registrate') }}</a></li>
                        @endif
                    </ul>
                
                </div>
            </div>
        </nav> 
@endsection

@section('contenido')
        @yield('content')
@endsection

@section('scripts')
    @yield('script')
@endsection