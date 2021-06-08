@extends('layouts.adminbase')

@section('sidenav')
<!-- SIDENAV -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{ route('admin.index') }}">
          <img src="{{ url('assets/img/house.png') }}" class="navbar-brand-img" alt="...">
          easyHome
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.usuarios')}}">
                <i class="ni ni-single-02 text-dark"></i>
                <span class="nav-link-text">Usuarios</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.inmuebles') }}">
                <i class="ni ni-shop text-dark"></i>
                <span class="nav-link-text">Inmuebles</span>
              </a>
            </li>
          </ul>
        </div>
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