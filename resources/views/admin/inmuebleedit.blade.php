@extends('layouts.adminapp')
@section('script')
<script src="https://cdn.tiny.cloud/1/gzpyrb46bhayxozbrs4be1me39ef9jh874msotgs2xzyojcr/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea', // #idtextarea
    });
</script>
@endsection
@section('content')
<div class="main-content" id="panel">

            <!-- TOPNAV -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ url('admin_assets/adminIcon.png') }}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="{{ url('admin/useredit/' . Auth::user()->id) }}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Mi perfil</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('/') }}" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Salir del Admin Area</span>
                </a>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
     <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{ url('admin_assets/img/theme/profile-cover.jpg') }}); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">

        </div>
      </div>
    </div>
    
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">

        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Editar Perfil</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ url( 'admin/inmuebleupdate/' . $inmueble->id ) }}" method="post" enctype="multipart/form-data">
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
                    <label for="comentario" class="col-sm-12 control-label">Comentario</label>
                    @error('comentario')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea name="comentario" id="comentario" placeholder="Describa aquí su inmueble">{{ $inmueble->comentario }}</textarea>
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
            </div>
          </div>
        </div>
      </div>
    
</div>    
@endsection