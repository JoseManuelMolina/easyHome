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
                        <h3 class="font-montserrat cover-heading mb20 mt20">{{ __('Registrate ahora') }}</h3>
                        <form method="POST" action="{{ route('register') }}" class="clearfix mb35">
                            @csrf
                            <div class="col-sm-8 col-sm-offset-2 mt10">
                                <input type="text" name="name" id="name" class="form-control text-center no-border input-lg input-circle bg-light-transparent @error('name') is-invalid @enderror" 
                                    placeholder="{{ __('Nombre')}}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            
                            <div class="col-sm-8 col-sm-offset-2 mt10">
                                <input type="text" name="email" id="email" class="form-control text-center no-border input-lg input-circle bg-light-transparent @error('email') is-invalid @enderror" 
                                    placeholder="{{__('Dirección Email')}}" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            
                            <div class="col-sm-8 col-sm-offset-2 mt10">
                                <!--<input type="password" name="password" id="password" class="form-control text-center no-border input-lg input-circle bg-light-transparent @error('password') is-invalid @enderror" 
                                    placeholder="{{ __('Password') }}" required autocomplete="new-password">-->
                                     <input id="password" type="password" class="text-center no-border input-lg input-circle bg-light-transparent form-control @error('password') is-invalid @enderror" name="password" 
                                     placeholder="{{ __('Contraseña') }}" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-sm-8 col-sm-offset-2 mt10">
                               <!-- <input type="password" name="password-confirmation" id="password-confirm" class="form-control text-center no-border input-lg input-circle bg-light-transparent" 
                                    placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">-->
                                    <input id="password-confirm" type="password" class="text-center no-border input-lg input-circle bg-light-transparent form-control" name="password_confirmation" 
                                    placeholder="{{ __('Confirme Contraseña') }}" required autocomplete="new-password">
                            </div>
                            
                            <div class="col-sm-8 col-sm-offset-2 mt5">
                                <button class="button button-lg button-circle button-block button-pasific hover-ripple-out" type="submit" >{{ __('Registrar') }}</button><br><br>
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
