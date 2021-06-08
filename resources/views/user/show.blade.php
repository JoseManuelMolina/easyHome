@extends('layouts.app')
@section('content')
    <!-- Sub Header
        ===================================== -->
    <header class="pt100 pb100 bg-grad-stellar"
        style="background-image: url({{ url('assets/img/bg/img-bg-43.jpg')}}); background-repeat: no-repeat; background-color: #fff; background-size: cover; background-position: bottom;">

        <div class="container mt100 mb70">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="fs-75 font-source-sans-pro font-size-light color-light animated fadeInUp visible"
                        data-animation="fadeInUp" data-animation-delay="100">
                        Mi Perfil
                    </h1>
                </div>

            </div>
        </div>

    </header>


    <!-- Portfolio Area
        ===================================== -->
    <div id="portfolioGrid" class="bg-gray pt30 pb75">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                        @if(!Auth::user()->email_verified_at) 
                            <form class="resend_email" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="button button-md button-rounded button-warning">
                                 <a class="" style="color:white">Verificar Email</i></a>
                                </button>
                            </form>
                        @else
                        <ul class="filters text-center mt25 mb50">
                            <li>
                                <button class="button button-md button-rounded button-pasific hover-icon-grow-rotate">
                                    <a class="" style="color:white" href="{{ route('user.edit') }}">Editar Perfil <i class="fa fa-cog"></i></a>
                                </button>
                            </li>
                            <li>
                                <button class="button button-md button-rounded button-pasific hover-icon-grow-rotate" type="button">
                                    <a class="" style="color:white" href="{{ url('inmueble/create') }}">Añadir un nuevo anuncio <i class="fa fa-plus"></i></a>
                                </button>
                            <li>
                                <button class="button button-md button-rounded button-pasific hover-icon-grow-rotate">
                                    <a class="" style="color:white" href="{{ url('inmueble') }}">Mis anuncios <i class="fa fa-home"></i></a>
                                </button>
                            </li>
                        </ul>
                        @endif

                </div>
            </div>
        </div>
    </div>
        <!-- Footer Area
    =====================================-->
    <footer id="footer" class="footer-one center-block bg-light pt50 pb30 ">
        <div class="container">
            <div class="row">
                    <div class="navbar-brand-footer center-block">easyHome</div>
                    <div class="copyright center-block">&copy; 2016. All rights reserved.</div>
            </div>
            
        </div>
    </footer>
@endsection