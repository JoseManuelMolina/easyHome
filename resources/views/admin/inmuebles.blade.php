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

        <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h1 class="text-white d-inline-block mb-0">Bienvenido Nombre Usuario</h1>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Usuarios</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $usuariosTotales }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                        <i class="ni ni-single-02"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Inmuebles</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $inmueblesTotales }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                        <i class="ni ni-shop"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Mensajes Recibidos</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $mensajesTotales }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                        <i class="ni ni-email-83"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Usuarios</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="status">ID</th>
                        <th scope="col" class="sort" data-sort="status">ID-User</th>
                        <th scope="col" class="sort" data-sort="name">Tipo</th>
                        <th scope="col">ID-Provincia</th>
                        <th scope="col">Habitaciones</th>
                        <th scope="col">Tamaño</th>
                        <th scope="col">Extras</th>
                        <th scope="col">Precio</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($inmuebles as $inmueble)
                      <tr>
                        <th scope="row">
                          <div class="media align-items-center">
                            <div class="media-body">
                              <span class="name mb-0 text-sm">{{ $inmueble -> id }}</span>
                            </div>
                          </div>
                        </th>
                        <td class="budget">
                          {{ $inmueble -> iduser }}
                        </td>
                        <td>
                          <span class="badge badge-dot mr-4">
                            <span class="status">{{ $inmueble -> tipo }}</span>
                          </span>
                        </td>
                        <td>
                          <span class="status">{{ $inmueble -> idprovincia }}</span>
                        </td>
                        <td>
                          <span class="status">{{ $inmueble -> nhabitaciones }}</span>
                        </td>
                        <td>
                          <span class="status">{{ $inmueble -> tamano }}</span>
                        </td>
                        <td>
                          <span class="status">{{ $inmueble -> extras }}</span>
                        </td>
                        <td>
                          <span class="status">{{ $inmueble -> precio }}</span>
                        </td>
                        <td class="text-right">
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="{{ url('admin/inmuebleedit/' . $inmueble->id) }}">Editar Inmueble</a>
                                <form method="post" action="{{ url('inmueble/destroy/' . $inmueble->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="card-footer" style="text-align:center">
                                    <button type="submit" onclick="return confirm('¿Estas seguro de que quieres eliminar este inmueble?')">Eliminar inmueble</button>
                                </div>
                                </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
@endsection