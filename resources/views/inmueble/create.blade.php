@extends('layouts.app')

@section('script')
<script src="https://cdn.tiny.cloud/1/gzpyrb46bhayxozbrs4be1me39ef9jh874msotgs2xzyojcr/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea', // #idtextarea
    });
</script>
@endsection

@section('content')

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

<!-- Sub Header
                                ===================================== -->
        <header class="pt100 pb100 bg-grad-stellar" style="background-image: url({{ url('assets/img/bg/img-bg-43.jpg')}}); background-repeat: no-repeat; background-color: #fff; background-size: cover; background-position: bottom;">

            <div class="container mt100 mb70">

                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="fs-75 font-source-sans-pro font-size-light color-light animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100">
                            Nuevo Anuncio
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
                                    <a class="" style="color:white" href="{{ route('user.edit') }}">Editar Perfil
                                        <i class="fa fa-cog"></i>
                                    </a>
                                </button>
                            </li>
                            <li>
                                <button class="button button-md button-rounded button-pasific hover-icon-grow-rotate">
                                    <a class="" style="color:white" href="{{ url('inmueble/create') }}">Añadir un nuevo anuncio
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </button>
                            </li>
                            <li>
                                <button class="button button-md button-rounded button-pasific hover-icon-grow-rotate">
                                    <a class="" style="color:white" href="{{ url('inmueble') }}">Mis anuncios
                                        <i class="fa fa-home"></i>
                                    </a>
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-12">
                        <h4 class="text-center mb20">Crea tu anuncio</h4>
                        <form
                            action="{{ url('inmueble') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="tipo" class="col-sm-2 control-label">Tipo</label>
                                @error('tipo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <select name="tipo" id="tipo" required class="form-control">
                                    <option value="" disabled @if(is_null(old('tipo'))) selected @endif>Seleccione el tipo de inmueble</option>
                                    @foreach($tipos as $id => $nombre)
                                        <option value="{{ $id }}" @if(old('tipo') == $id) selected @endif>{{ $nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="idprovincia" class="col-sm-2 control-label">Provincia</label>
                                @error('idprovincia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <select name="idprovincia" id="idprovincia" required class="form-control">
                                    <option value="" disabled @if(is_null(old('idprovincia'))) selected @endif>Seleccione la provincia</option>
                                    @foreach($provincias as $provincia)
                                        <option value="{{ $provincia->id }}" @if(old('provincia') == $provincia->id) selected @endif>{{ $provincia->provincia }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="direccion" class="col-sm-2 control-label">Dirección</label>
                                @error('direccion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" maxlength="50" required class="form-control" id="direccion" name="direccion" placeholder="dirección" value="{{ old('direccion') }}">
                            </div>
                            <div class="form-group">
                                <label for="nhabitaciones" class="col-sm-2 control-label">Número de habitaciones</label>
                                @error('nhabitaciones')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="number" min="1" max="30" required class="form-control" id="nhabitaciones" name="nhabitaciones" placeholder="2" value="{{ old('nhabitaciones') }}">
                            </div>
                            <div class="form-group">
                                <label for="tamano" class="col-sm-2 control-label">Tamaño (metros cuadrados)</label>
                                @error('tamano')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="number" min="20" max="1500" step="0.1" required class="form-control" id="tamano" name="tamano" placeholder="40" value="{{ url('tamano') }}">
                            </div>
                            <div class="form-group">
                                <label for="extras" class="col-sm-3 control-label">Extras (aire acondicionado, piscina...)</label>
                                @error('extras')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" maxlength="50" class="form-control" id="extras" name="extras" placeholder="Extras" value="{{ old('extras') }}">
                            </div>
                            <div class="form-group">
                                <label for="precio" class="col-sm-2 control-label">Precio</label>
                                @error('precio')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="number" min="0.00" max="999999999.99" step="0.01" required class="form-control" id="precio" name="precio" placeholder="00,00" value="{{ old('precio') }}">
                            </div>
                            <div class="form-group">
                                <label for="foto" class="col-sm-10 control-label">Foto</label>
                                @error('foto')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input id="foto" name="foto" type="file" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="comentario" class="col-sm-12 control-label">Comentario</label>
                                @error('comentario')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <textarea class="form-control" name="comentario" id="comentario" placeholder="Describa aquí su inmueble">{{ old('comentario') }}</textarea>
                            </div>
                            <button class="button button-lg button-circle button-block button-pasific hover-ripple-out hover-icon-pop" type="submit">
                                Crear
                                <i class="fa fa-plus"></i>
                            </button>
                        </form>
                    </div>
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