@extends('layouts.app')
@section('content')
<!-- Subheader Area
===================================== -->
<header class="bg-grad-stellar mt70" style="background-image: url({{ url('assets/img/bg/img-bg-43.jpg') }}); background-repeat: no-repeat; background-color: #fff; background-size: cover; background-position: bottom;">

    <div class="container">
        <div class="row mt20 mb30">
            <div class="col-md-6 text-left">
                <h3 class="color-white text-uppercase">Editar Inmueble</h3>
            </div>
        </div>
    </div>

</header>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $index => $error)
            <li>error {{ $index }}: {{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@error('store')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<!-- Shop Area
===================================== -->
<div id="shop" class="bg-light pt75 pb75">            
    <div id="shop-item-details" class="container">
        <div class="row">

            <form action="{{ url( 'inmueble/' . $inmueble->id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Tipo</label>
                    @error('tipo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <select name="tipo" id="tipo" required class="form-control">
                        <option value="" disabled>Seleccione el tipo de inmueble</option>
                            @foreach($tipos as $id => $nombre)
                                <option value="{{ $id }}" @if($inmueble ->tipo == $id) selected @endif>{{ $nombre }}</option>
                            @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="idprovincia" class="col-sm-2 control-label">Provincia</label>
                    @error('idprovincia')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <select name="idprovincia" id="idprovincia" required class="form-control">
                        <option value="" disabled>Seleccione la provincia</option>
                            @foreach($provincias as $provincia)
                                <option value="{{ $provincia->id }}" @if($inmueble->idprovincia == $provincia->id) selected @endif>{{ $provincia->provincia }}</option>
                            @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="direccion" class="col-sm-2 control-label">Dirección</label>
                    @error('direccion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" maxlength="50" required class="form-control" id="direccion" name="direccion" placeholder="dirección" value="{{ $inmueble->direccion }}">
                </div>
                
                <div class="form-group">
                    <label for="nhabitaciones" class="col-sm-2 control-label">Número de habitaciones</label>
                    @error('nhabitaciones')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="number" min="1" max="30" required class="form-control" id="nhabitaciones" name="nhabitaciones" placeholder="2" value="{{ $inmueble->nhabitaciones }}">
                </div>
                
                <div class="form-group">
                    <label for="tamano" class="col-sm-2 control-label">Tamaño (metros cuadrados)</label>
                    @error('tamano')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="number" min="20" max="1500" required class="form-control" id="tamano" name="tamano" placeholder="40" value="{{ $inmueble->tamano }}">
                </div>
                
                <div class="form-group">
                    <label for="extras" class="col-sm-3 control-label">Extras (aire acondicionado, piscina...)</label>
                    @error('extras')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" maxlength="50" class="form-control" id="extras" name="extras" placeholder="Extras" value="{{ $inmueble->extras }}">
                </div>
                
                <div class="form-group">
                    <label for="precio" class="col-sm-2 control-label">Precio</label>
                    @error('precio')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="number" min="0.00" max="999999999.99" step="0.01" required class="form-control" id="precio" name="precio" placeholder="00,00" value="{{ $inmueble->precio }}">
                </div>
                    
                    
                <div class="form-group">
                    <label for="foto" >Foto</label>
                    @error('foto')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br><br>
                    <input id="foto" multiple name="foto[]" type="file" accept="image/*">
                </div>
                
                <div class="form-group">
                    <label for="foto">Fotografía de portada actual: </label>
                    <br><br>
                    @if($inmueble->foto != null)
                        <img src="data:image/jpeg;base64,{{$inmueble->foto}}">
                        <br>
                        <button type="submit" name="unsetcover" class="button button-md button-rounded button-red" style="margin-top:10px">Eliminar foto de portada</button>
                    @else
                        <h4>No hay foto de portada</h4>
                    @endif
                </div>

                <div class="form-group">
                        <label>Fotografías actuales:</label>
                        <br><br>
                    @foreach( $fotos as $foto )
                        <div>
                            <img src="{{asset(Storage::url($foto))}}" width="400px">
                            <br>
                            <button type="submit" name="set" value="{{ $foto }}" class="button button-md button-rounded button-pasific" style="margin-top:10px">Establecer como foto principal</button>
                            <button type="submit" name="unset" value="{{ $foto }}" class="button button-md button-rounded button-red" style="margin-top:10px">Eliminar foto</button>
                            <br>
                        </div>
                    @endforeach
                </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer" style="text-align:center">
                    <button type="submit" class="button button-lg button-circle button-block button-pasific hover-ripple-out hover-icon-pop">Editar</button>
                </div>
            </form>
            
            <form method="post" action="{{ url( 'inmueble/' . $inmueble->id ) }}">
                @csrf
                @method('DELETE')
                <div class="card-footer" style="text-align:center">
                    <button type="submit" class="button button-lg button-circle button-block button-danger hover-ripple-out hover-icon-pop" onclick="return confirm('¿Estas seguro de que quieres eliminar este inmueble?')">Eliminar Inmueble <i class="fa fa-trash"></i></button>
                </div>
            </form>
            


        </div><!-- row end -->
      
    </div>
</div><!-- shop details end -->

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