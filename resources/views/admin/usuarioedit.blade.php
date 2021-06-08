@extends('layouts.adminapp')

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
              <form action="{{ url( 'admin/userupdate/' . $usuario -> id ) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="name">Nombre</label>
                        @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" id="name" name="name" class="form-control" value="{{ $usuario -> name }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email</label>
                        @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $usuario->email) }}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="rol">Rol</label>
                        @error('rol')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <select name="rol" id="rol" required class="form-control">
                            <option value="" disabled>Rol</option>
                                @foreach($roles as $id => $nombre)
                                    <option value="{{ $id }}" @if($usuario ->rol == $id) selected @endif>{{ $nombre }}</option>
                                @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <button type="submit">Editar</button>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    
</div>    
@endsection