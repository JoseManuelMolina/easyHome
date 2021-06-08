@extends('layouts.app')

@section('content')
        <div class="site-wrapper" style="background:url('assets/img/bg/img-bg-36.jpg') 50% 50% no-repeat;">

            <div class="site-wrapper-inner">
                <div class="cover-container">
                    <div class="masthead clearfix">
                        <div class="inner"></div>
                    </div>

                    <div id="formLogin" class="inner cover text-center animated" data-animation="fadeIn" data-animation-delay="100">
                        
                        <br>
                        <h3 class="font-montserrat cover-heading mb20 mt20">Iniciar Sesión</h3>
                        <form method="POST" class="clearfix mb35">
                            @csrf
                            <div class="col-sm-8 col-sm-offset-2">
                                <input type="email" name="email" id="email" class="text-center no-border input-lg input-circle bg-light-transparent form-control @error('email') is-invalid @enderror" placeholder="{{__('Dirección E-Mail')}}"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
                            <div class="col-sm-8 col-sm-offset-2 mt10">
                                <input id="password" type="password" name="password" class="form-control text-center no-border input-lg input-circle bg-light-transparent @error('password') is-invalid @enderror" placeholder="{{ __('Contraseña') }}"
                                    required autocomplete="current-password">
                                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-sm-8 col-sm-offset-2 mt5">
                                <button class="button button-lg button-circle button-block button-pasific hover-ripple-out" type="submit">{{__('Iniciar Sesión')}}</button><br><br>
                                
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="color-light mt20">{{__('¿Has olvidado tu contraseña?')}}</a><br>
                                @endif
                                <a href="{{ route('register') }}" class="color-light mt20" id="showFormRegister">Registrate ahora</a>
                            </div>
                        </form>
                        <br>
                    </div>
                    <div class="mastfoot">
                        <div class="inner">
                            <p class="color-light text-center">&copy;2016 easyHome by Jose</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
@endsection
