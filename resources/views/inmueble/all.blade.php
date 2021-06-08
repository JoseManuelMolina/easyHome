@extends('layouts.app')
@section('contenido')
<header class="pt100 pb100 bg-grad-stellar" style="background-image: url({{ url('assets/img/bg/img-bg-36.jpg')}}); background-repeat: no-repeat; background-color: #fff; background-size: cover;">

            <div class="container mt100 mb70">
                
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="fs-75 font-source-sans-pro font-size-light color-light animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100">
                            Bienvenido a easyHome
                        </h1>
                    </div>
                    
                </div>
            </div>
            
    </header>
        
        
        <!-- Shop Area
        ===================================== -->
        <div id="shop" class="bg-light pt25">
            <div class="container">
                
                <div class="row">                    
                    
                    <div class="col-md-9 col-md-push-3">
                        
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
                                    <h3>
                                        @if($inmueble->tipo == "vivienda")
                                            Vivienda
                                        @elseif($inmueble->tipo == "habitacion")
                                            Habitacion
                                        @elseif($inmueble->tipo == "local")
                                            Local
                                        @elseif($inmueble->tipo == "oficina")
                                            Oficina
                                        @endif
                                         en {{ $inmueble->direccion }}
                                     </h3>
                                     
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
        
                                @auth
                                    <a class="button button-md button-pasific hover-icon-pulse-shrink mt25" href="{{ url( 'inmueble/' .  $inmueble->id ) }}">Ver más<i class="fa fa-eye"></i></a>
                                @endauth
                                @guest
                                    <a class="button button-md button-pasific hover-icon-pulse-shrink mt25" href="{{ url( 'show/' .  $inmueble->id ) }}">Ver más<i class="fa fa-eye"></i></a>
                                @endguest
                                </div>
                            </div>
                        @endforeach

                        
                        {{ $inmuebles -> appends($parametros) -> links()}}
                        <?php 
                            //echo $inmuebles->render();
                        ?>
                                     
                    </div>
                            
                    <!-- Sidebar
                    ===================================== -->
                    <div id="sidebar" class="col-md-3 col-md-pull-9 mt25 animated" data-animation="fadeInLeft" data-animation-delay="250">           
                        
                        
                        <!-- Filter
                        ===================================== -->
                        <div class="pr25 pl25 clearfix">
                            <form name="filter" method="get" action="{{ route('filter') }}">
                            <h5 class="mt25">
                                Filtrar
                                <span class="heading-divider mt10"></span>
                            </h5> 
                            @if(isset($request))

                            @endif
                            <label for="tipo">Tipo de inmueble</label>
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="" selected>Seleccione el tipo de inmueble</option>
                                    @foreach($tipos as $id => $nombre)
                                        <option value="{{ $id }}"
                                            @if(isset($request))
                                                @if($request->tipo == 'habitacion' && $nombre == 'Habitacion')
                                                    selected
                                                @elseif($request->tipo == 'vivienda' && $nombre == 'Vivienda')
                                                    selected
                                                @elseif($request->tipo == 'local' && $nombre == 'Local')
                                                selected
                                                @elseif($request->tipo == 'oficina' && $nombre == 'Oficina')
                                                selected
                                                @endif
                                            @endif
                                        >{{ $nombre }}</option>
                                    @endforeach
                            </select>
                            
                            <h5 class="mt25">
                                <span class="heading-divider mt10"></span>
                            </h5>
                            
                            <label for="idprovincia">Provincia</label>
                            <select name="idprovincia" id="idprovincia" class="form-control">
                                <option value="" selected>Seleccione la provincia</option>
                                    @foreach($provincias as $provincia)
                                        <option value="{{ $provincia->id }}" 
                                        @if(isset($request))
                                            @if($request->idprovincia == $provincia->id)
                                                selected
                                            @endif
                                        @endif
                                        >{{ $provincia->provincia }}</option>
                                    @endforeach
                            </select>
                            
                            <h5 class="mt25">
                                <span class="heading-divider mt10"></span>
                            </h5>
                            
                            <!--<input type="text" id="shop-range-price" name="shop-range-price" value="" />-->
                            <label for="minprecio">Precio Mínimo</label>
                            <input type="number" min="0.00" max="999999999.99" step="0.01" class="form-control" id="minprecio" name="minprecio" 
                                @if(isset($request))
                                    @if($request->minprecio != null)
                                        placeholder="{{$request->minprecio}}"
                                        value="{{$request->minprecio}}"
                                    @else
                                        placeholder="00,00" 
                                        value=""
                                    @endif
                                @else
                                    placeholder="00,00" 
                                    value=""
                                @endif
                                >
                            <label for="maxprecio">Precio Máximo</label>
                            <input type="number" min="0.00" max="999999999.99" step="0.01" class="form-control" id="maxprecio" name="maxprecio" 
                                @if(isset($request))
                                    @if($request->maxprecio != null)
                                        placeholder="{{$request->maxprecio}}"
                                        value="{{$request->maxprecio}}"
                                    @else
                                        placeholder="00,00" 
                                        value=""
                                    @endif
                                @else
                                    placeholder="00,00" 
                                    value=""
                                @endif
                                >
                            
                            <h5 class="mt25">
                                <span class="heading-divider mt10"></span>
                            </h5>
                            
                            <label for="minnhabitaciones">Número de habitaciones mínimo</label>
                            <input type="number" min="1" max="30" class="form-control" id="minnhabitaciones" name="minnhabitaciones" 
                                @if(isset($request))
                                    @if($request->minnhabitaciones != null)
                                        placeholder="{{$request->minnhabitaciones}}"
                                        value="{{$request->minnhabitaciones}}"
                                    @else
                                        placeholder="1" 
                                        value=""
                                    @endif
                                @else
                                    placeholder="1"
                                    value=""
                                @endif
                                >
                            <label for="maxnhabitaciones">Número de habitaciones máximo</label>
                            <input type="number" min="1" max="30" class="form-control" id="maxnhabitaciones" name="maxnhabitaciones" 
                                @if(isset($request))
                                    @if($request->maxnhabitaciones != null)
                                        placeholder="{{$request->maxnhabitaciones}}"
                                        value="{{$request->maxnhabitaciones}}"
                                    @else
                                        placeholder="1" 
                                        value=""
                                    @endif
                                @else
                                    placeholder="1"
                                    value=""
                                @endif
                                >
                            
                            <h5 class="mt25">
                                <span class="heading-divider mt10"></span>
                            </h5>
                            
                            <label for="mintamano">Tamaño mínimo (metros cuadrados)</label>
                            <input type="number" min="20" max="1500" class="form-control" id="mintamano" name="mintamano" 
                                @if(isset($request))
                                    @if($request->mintamano != null)
                                        placeholder="{{$request->mintamano}}"
                                        value="{{$request->mintamano}}"
                                    @else
                                        placeholder="20" 
                                        value=""
                                    @endif
                                @else
                                    placeholder="20" 
                                    value=""
                                @endif 
                                >
                            <label for="maxtamano">Tamaño máximo (metros cuadrados)</label>
                            <input type="number" min="20" max="1500" class="form-control" id="maxtamano" name="maxtamano" 
                                @if(isset($request))
                                    @if($request->maxtamano != null)
                                        placeholder="{{$request->maxtamano}}"
                                        value="{{$request->maxtamano}}"
                                    @else
                                        placeholder="20"
                                        value=""
                                    @endif
                                @else
                                    placeholder="20"
                                    value=""
                                @endif 
                                >
                            
                            <h5 class="mt25">
                                <span class="heading-divider mt10"></span>
                            </h5>
                            
                            <label>Ordenar por:</label>
                                        <select class="form-control" id="orderBy" name="orderBy">
                                            <option selected value="null">Ordenar</option>
                                            <option value="id_asc" 
                                            @if(isset($request))
                                                @if($request->orderBy == "id_asc")
                                                    selected
                                                @endif
                                            @endif 
                                            >El más antiguo</option>
                                            <option value="id_desc"
                                            @if(isset($request))
                                                @if($request->orderBy == "id_desc")
                                                    selected
                                                @endif
                                            @endif 
                                            >El más nuevo</option>
                                            <option value="precio_desc"
                                            @if(isset($request))
                                                @if($request->orderBy == "precio_desc")
                                                    selected
                                                @endif
                                            @endif 
                                            >Mayor Precio</option>
                                            <option value="precio_asc"
                                            @if(isset($request))
                                                @if($request->orderBy == "precio_asc")
                                                    selected
                                                @endif
                                            @endif 
                                            >Menor Precio</option>
                                        </select>
                            
                            <h5 class="mt25">
                                <span class="heading-divider mt10"></span>
                            </h5>
                            
                            <label>Enseñar:</label>
                                    <select class="form-control" id="nrp" name="nrp">
                                        <option value="null" selected>Inmuebles por pagina</option>
                                        <option value="5"
                                        @if(isset($request))
                                            @if($request->nrp == "5")
                                                selected
                                            @endif
                                        @endif 
                                        >5</option>
                                        <option value="10"
                                        @if(isset($request))
                                            @if($request->nrp == "10")
                                                selected
                                            @endif
                                        @endif 
                                        >10</option>
                                        <option value="20"
                                        @if(isset($request))
                                            @if($request->nrp == "15")
                                                selected
                                            @endif
                                        @endif 
                                        >20</option>
                                        <option value="25"
                                        @if(isset($request))
                                            @if($request->nrp == "25")
                                                selected
                                            @endif
                                        @endif 
                                        >25</option>
                                        <option value="50"
                                        @if(isset($request))
                                            @if($request->nrp == "50")
                                                selected
                                            @endif
                                        @endif 
                                        >50</option>
                                    </select>
                            
                            <button type="submit" class="button button-block button-sm button-pasific mt10 hover-ripple-out">Filtrar</button>
                            </form>
                        </div>                 
                        
                                                    
                        
                    </div><!-- sidebar end -->
                             
                </div><!-- row end -->
            </div><!-- container end -->
        </div><!-- shop section end -->
                
        

        
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

@section('script')
    <!--<script src="{{url('assets/js/orderby.js')}}"></script>-->
@endsection