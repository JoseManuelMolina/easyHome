@extends('layouts.app')
@section('content')
    <!-- Subheader Area
        ===================================== -->
        <header class="bg-grad-stellar mt70" style="background-image: url({{ url('assets/img/bg/img-bg-43.jpg')}}); background-repeat: no-repeat; background-color: #fff; background-size: cover; background-position: bottom;">

            <div class="container">
                <div class="row mt20 mb30">
                    <div class="col-md-6 text-left">
                        <h3 class="color-white text-uppercase">Detalles del Inmueble</h3>
                    </div>
                </div>
            </div>

        </header>
        
        
        <!-- Shop Area
        ===================================== -->
        <div id="shop" class="bg-light pt75 pb75">            
            <div id="shop-item-details" class="container">
                
                
                <div class="row">

                    <!-- Item Photo
                    ===================================== -->
                    <div class="col-md-4 col-sm-6 col-xs-12">                    
                        <div class="shop-item-detail-photo center-block mb25" style="background-color: #ffffff;">
                            
                            @if($inmueble->foto != null)
                                <img src="data:image/jpeg;base64,{{$inmueble->foto}}" alt="shop item" class="img-responsive shop-item-detail-photo-active">
                            @else
                                <img src="{{url('assets/img/default.jpg')}}" alt="shop item" class="img-responsive center-block shop-item-img-list-view">
                            @endif
                        </div>                    
                    </div>

                    <!-- Products Summary
                    ===================================== -->
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <div class="shop-item-detail-description">
                            <h3>@if($inmueble->tipo == "vivienda")
                                Vivienda
                                @elseif($inmueble->tipo == "habitacion")
                                Habitacion
                                @elseif($inmueble->tipo == "local")
                                Local
                                @elseif($inmueble->tipo == "oficina")
                                Oficina
                                @endif
                                     en {{ $inmueble->direccion }}</h3>

                            <div class="shop-item-sku mt20 pt10 bt-dotted-1">
                                Tipo: <span class="color-black strong">{{ $inmueble->tipo }}</span>
                            </div>

                            <div class="shop-item-available mt5">
                                Dirección: <span class="color-black strong">{{ $inmueble->direccion }}</span>
                            </div>

                            <div class="row shop-item-detail-price mt10 bt-dotted-1">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <ins><span class="amount">{{ $inmueble->precio }}€</span></ins>
                                </div>
                            </div>             

                            <div class="shop-item-detail-desc mt10 pt10 bt-dotted-1">
                                    Comentario:<br>
                                    {!! $inmueble->comentario !!} 
                            </div>

                            <div class="shop-item-detail-desc mt10 pt10 bt-dotted-1">
                                    Extras: <span class="color-black strong"> {{ $inmueble->extras }}</span>
                            </div>

                            <div class="shop-item-detail-desc mt10 pt10 bt-dotted-1">
                                    Número de habitaciones: <span class="color-black strong"> {{ $inmueble->nhabitaciones }}</span>
                            </div>

                            <div class="shop-item-detail-desc mt10 pt10 bt-dotted-1">
                                    Tamaño: <span class="color-black strong"> {{ $inmueble->tamano }} metros cuadrados</span>
                            </div>
                        </div>                    
                    </div>

                </div><!-- row end -->

                <!-- Tab Content
                ===================================== -->
                <div id="portfolioGrid" class="pt30 pb75">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="filters text-center  mt25 mb50 nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" class="text-uppercase">Galería</a></li>
                                    </ul>
                                    
                                    <div class="portfolio center-block">
                                        
                                        @if($fotos == null)
                                            <h5>No hay más fotos de este inmueble</h5>
                                        @endif
                                        
                                        @foreach($fotos as $foto)
                                            <div class="portfolio-item col-md-3 col-sm-3 col-xs-3 wordpress woocommerce" data-category="">
                                            <a href="{{asset(Storage::url($foto))}}" class="magnific-popup">
                                                <span class="glyphicon glyphicon-search hover-bounce-out"></span>
                                            </a>
                                            <img src="{{asset(Storage::url($foto))}}" alt="" class="img-responsive animated" data-animation="zoomIn" data-animation-delay="100" style="height:200px">                                
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->


              
            </div>
        </div><!-- shop details end -->
                
        @auth
            @if($inmueble->iduser == Auth::user()->id || Auth::user()->rol == 'admin')
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="filters text-center  mt25 mb50">
                            <li style="list-style:none">
                                <button class="button button-md button-rounded button-pasific hover-icon-grow-rotate">
                                    <a class="" style="color:white" href="{{ url( 'inmueble/' . $inmueble->id . '/edit' ) }}">Editar Inmueble <i class="fa fa-cog"></i></a>
                                </button>
                                <form method="post" action="{{ url( 'inmueble/' . $inmueble->id ) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="card-footer" style="text-align:center">
                                        <button type="submit" class="button button-md button-rounded button-danger hover-ripple-out hover-icon-pop" onclick="return confirm('¿Estas seguro de que quieres eliminar este inmueble?')">Eliminar Inmueble<i class="fa fa-trash"></i></button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            @if($inmueble->iduser != Auth::user()->id)
            <!-- Contact Us Area
        =====================================-->
        <div id="contact" class="pt50 pb100">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="row">

                            <!-- title start -->
                            <div class="col-md-12">
                                <h3 class="" style="text-align: center;">Envíele un correo</h3>
                            </div>
                            <!-- title end -->

                        </div><!-- row left end -->
                    </div><!-- col left end -->

                    <div class="col-md-12">
                        <div class="contact contact-us-two border-primary border-black" style="width: 100%;">
                            <div class="col-sm-12 col-xs-12 text-center mb20">
                                <h4 class="pb25 bb-solid-1 text-uppercase">
                                    Contácte con el vendedor
                                </h4>
                            </div>
                            <form name="contactform" id="contactForm" method="get" action="{{ url('/store/mensaje/' . $inmueble->id) }}">
                                
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!-- fullname start -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="nombre">Nombre:</label>
                                    @error('nombre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="nombre" id="nombre" class="input-md input-rounded form-control" placeholder="Nombre Completo" maxlength="100" required>
                                </div>
                                <!-- fullname end -->

                                <!-- email start -->
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">E-mail:</label>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="email" name="email" id="email" class="input-md input-rounded form-control" placeholder="Dirección E-mail" maxlength="100" required>
                                </div>
                                 <!-- email end -->

                                <!-- website start -->
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="telefono">Teléfono:</label>
                                    @error('telefono')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="telefono" id="telefono" class="input-md input-rounded form-control" placeholder="Número de teléfono" maxlength="100">
                                </div>
                                <!-- website end -->

                                <!-- textarea start -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    @error('message')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea class="form-control" name="message" id="message" rows="7" placeholder="Escriba aquí su mensaje" required></textarea>
                                </div>
                                <!-- textarea end -->

                                <!-- button start -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="button-o button-lg button-circle button-block button-pasific hover-shutter-out-horizontal">Send Message</button>
                                </div>
                                <!-- button end -->

                                <!--
                                <div id="sendingMessage" class="statusMessage sending-message"><p>Sending your message. Please wait...</p></div>
                                <div id="successMessage" class="statusMessage success-message"><p>Thanks for sending your message! We'll get back to you shortly.</p></div>
                                <div id="failureMessage" class="statusMessage failure-message"><p>There was a problem sending your message. Please try again.</p></div>
                                <div id="incompleteMessage" class="statusMessage"><p>Please complete all the fields in the form before sending.</p></div>
                                -->

                            </form>
                        </div><!-- div contact end -->
                    </div><!-- col end -->

                </div><!-- row end -->
            </div><!-- container end -->
        </div>
            @endif
        @endauth
        
        @guest
        <!-- Contact Us Area
        =====================================-->
        <div id="contact" class="pt50 pb100">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="row">

                            <!-- title start -->
                            <div class="col-md-12">
                                <h3 class="" style="text-align: center;">Envíele un correo</h3>
                            </div>
                            <!-- title end -->

                        </div><!-- row left end -->
                    </div><!-- col left end -->

                    <div class="col-md-12">
                        <div class="contact contact-us-two border-primary border-black" style="width: 100%;">
                            <div class="col-sm-12 col-xs-12 text-center mb20">
                                <h4 class="pb25 bb-solid-1 text-uppercase">
                                    Contácte con el vendedor
                                </h4>
                            </div>
                            <form name="contactform" id="contactForm" method="post" action="{{ url( 'contact/' .  $inmueble->id ) }}">
                                @csrf

                                <!-- fullname start -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" id="nombre" class="input-md input-rounded form-control" placeholder="Nombre Completo" maxlength="100" required>
                                </div>
                                <!-- fullname end -->

                                <!-- email start -->
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">E-mail:</label>
                                    <input type="email" name="email" id="email" class="input-md input-rounded form-control" placeholder="Dirección E-mail" maxlength="100" required>
                                </div>
                                 <!-- email end -->

                                <!-- phone start -->
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="text" name="telefono" id="telefono" class="input-md input-rounded form-control" placeholder="Número de teléfono" maxlength="100">
                                </div>
                                <!-- phone end -->

                                <!-- textarea start -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="mensaje" id="mensaje" rows="7" placeholder="Escriba aquí su mensaje" required></textarea>
                                </div>
                                <!-- textarea end -->

                                <!-- button start -->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="button-o button-lg button-circle button-block button-pasific hover-shutter-out-horizontal">Send Message</button>
                                </div>
                                <!-- button end -->

                                <!--
                                <div id="sendingMessage" class="statusMessage sending-message"><p>Sending your message. Please wait...</p></div>
                                <div id="successMessage" class="statusMessage success-message"><p>Thanks for sending your message! We'll get back to you shortly.</p></div>
                                <div id="failureMessage" class="statusMessage failure-message"><p>There was a problem sending your message. Please try again.</p></div>
                                <div id="incompleteMessage" class="statusMessage"><p>Please complete all the fields in the form before sending.</p></div>
                                -->

                            </form>
                        </div><!-- div contact end -->
                    </div><!-- col end -->

                </div><!-- row end -->
            </div><!-- container end -->
        </div>
        @endguest
    
         
        
        <!-- Footer Area
        =====================================-->
        <footer id="footer" class="footer-one center-block bg-light pt50 pb30 ">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md121 col-xs-12 mb25">
                        <div class="navbar-brand-footer center-block">Pasific</div>
                        <div class="copyright center-block">&copy; 2016. All rights reserved.</div>
                    </div>
                    
                    
                </div>
                
            </div>
        </footer>
@endsection