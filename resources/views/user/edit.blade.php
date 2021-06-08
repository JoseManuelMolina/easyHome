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
                        Editar Perfil
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

                    <form class="clearfix mb35" method="POST" action="{{ url('user/update') }}" id="editUserForm" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-sm-12 col-sm-offset-2 mt10">
                            <input type="text" name="name" id="name"
                                class="text-center no-border input-lg input-circle bg-light-transparent form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}"
                                placeholder="{{ old('name', $user->name) }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <br><br><hr>
                        <div class="col-sm-12 col-sm-offset-2 mt10">
                            <input type="text" name="email" id="email"
                                class="text-center no-border input-lg input-circle bg-light-transparent form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                                placeholder="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br><hr>
                        <div class="col-sm-12 col-sm-offset-2 mt10">
                            <input type="password" name="password" id="password"
                                class="text-center no-border input-lg input-circle bg-light-transparent form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('Contraseña Actual') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br><hr>
                        <div class="col-sm-12 col-sm-offset-2 mt10">
                            <input id="newpassword" type="password" class="text-center no-border input-lg input-circle bg-light-transparent form-control @error('newpassword') is-invalid @enderror" 
                                name="newpassword" placeholder="{{ __('Nueva contraseña') }}">
                                <!-- si hay un error -->
                                @error('newpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong><br>
                                    </span>
                                @enderror
                                <!-- si hay más de un error, mostrar uno -->
                                @if ($errors->has('newpassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('newpassword') }}</strong><br>
                                    <span></span>
                                @endif
                                <!-- si hay más de un error, mostrar todos -->
                                @if ($errors->has('newpassword'))
                                    <span class="invalid-feedback" role="alert">
                                    @foreach($errors->get('newpassword') as $error)
                                        <strong>{{ $error }}</strong><br>
                                    @endforeach
                                    </span>
                                @endif
                        </div>
                        <br><hr>
                        <div class="col-sm-12 col-sm-offset-2 mt10">
                            <input id="newpassword_confirmation" type="password" class="text-center no-border input-lg input-circle bg-light-transparent form-control @error('newpassword_confirmation') is-invalid @enderror" 
                            name="newpassword_confirmation" placeholder="{{ __('Confirmar Nueva Contraseña') }}">
                            @error('newpassword_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-sm-offset-2 mt5">
                            <button
                                class="button button-lg button-circle button-block button-pasific hover-ripple-out" type="submit">{{ __('Editar') }}</button><br><br>
                        </div>
                    </form>
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