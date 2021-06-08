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
                        Mis Anuncios
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
                    <ul class="filters text-center  mt25 mb50">
                        <li>
                            <button class="button button-md button-rounded button-pasific hover-icon-grow-rotate">
                                <a class="" style="color:white" href="{{ route('user.edit') }}">Editar Perfil <i class="fa fa-cog"></i></a>
                            </button>
                        </li>
                        <li>
                            <button class="button button-md button-rounded button-pasific hover-icon-grow-rotate">
                                <a class="" style="color:white" href="{{ url('inmueble/create') }}">Añadir un nuevo anuncio <i class="fa fa-plus"></i></a>
                            </button>
                        <li>
                            <button class="button button-md button-rounded button-pasific hover-icon-grow-rotate">
                                <a class="" style="color:white" href="{{ url('inmueble') }}">Mis anuncios <i class="fa fa-home"></i></a>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div id="shop" class="bg-light pt25">
            <div class="container">  
                <div class="row">
                    

                    @if($inmuebles->isEmpty())
                        <div class="col-md-6 col-sm-4 col-xs-12">
                            <h3>Aún no has añadido ningún anuncio</h3>
                        </div>
                    @else
                        @foreach( $inmuebles as $inmueble )
                            <div class="row bt-solid-1 bb-dashed-1 pb25">
                                <!-- Item Image
                                ======================== -->
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <div class="shop-item-container-in">
                                        @if($inmueble->foto != null)
                                            <img src="data:image/jpeg;base64,{{$inmueble->foto}}" alt="shop item" class="img-responsive center-block shop-item-img-list-view">
                                        @else
                                            <img src="{{url('assets/img/default.jpg')}}" alt="shop item" class="img-responsive center-block shop-item-img-list-view">
                                        @endif
                                    </div>
                                </div>
        
                                <!-- Item Summary
                                ======================== -->
                                <div class="col-md-6 col-sm-4 col-xs-12">
                                    <h3>{{$inmueble->tipo}} en {{$inmueble->direccion}}</h3>
                                        {!! $inmueble->comentario !!} 
                                    <ul>
                                        <li>Número de Habitaciones: {{$inmueble->nhabitaciones}}</li>
                                        <li>Metros Cuadrados: {{$inmueble->tamano}}</li>
                                        <li>Extras: {{$inmueble->extras}}</li>
                                    </ul>
                                </div>
        
                                <!-- Item Price
                                ======================== -->
                                <div class="col-md-3 col-sm-4 col-xs-12 text-center">
                                    <div class="shop-item-detail-price">
                                        <ins><span class="amount">{{$inmueble->precio}}</span></ins>
                                    </div>
        
                                    <a class="button button-md button-pasific hover-icon-pulse-shrink mt25" href="{{ url( 'inmueble/' .  $inmueble->id ) }}">Ver más<i class="fa fa-eye"></i></a>
                                    <a class="button button-md button-pasific hover-icon-forward mt25">Contactar<i class="fa fa-envelope"></i></a>
                                    @if($inmueble->iduser == Auth::user()->id || Auth::user()->rol == 'admin')
                                        <form method="post" action="{{ url( 'inmueble/' . $inmueble->id ) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="card-footer" style="text-align:center">
                                                <button type="submit" class="button button-md button-rounded button-danger hover-ripple-out hover-icon-pop" onclick="return confirm('¿Estas seguro de que quieres eliminar este inmueble?')">Eliminar Inmueble<i class="fa fa-trash"></i></button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                        

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