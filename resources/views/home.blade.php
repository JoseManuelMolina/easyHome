@extends('layouts.app')
@section('content')
        <div class="site-wrapper" style="background:url('assets/img/bg/img-bg-36.jpg') 50% 50% no-repeat;">

            <div class="site-wrapper-inner">
                <div class="cover-container">
                    <div class="masthead clearfix">
                        <div class="inner">
                            <!-- Navigation Area
                            ===================================== -->
                            <!--<nav class="navbar navbar-pasific navbar-mp megamenu navbar-fixed-top">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <a class="navbar-brand page-scroll" href="page-login-register-2.html#page-top">
                                            <img src="assets/img/house.png" alt="logo" class="">
                                            <span class="color-dark">easyHome</span>
                                        </a>
                                    </div>

                                    <div class="navbar-collapse collapse navbar-main-collapse">
                                        <ul class="nav navbar-nav">
                                            <li class=""><a href="#"><span class="color-dark">Home</span></a>
                                            <li class=""><a href="#"><span class="color-dark">About</span> </a>
                                            <li class=""><a href="#"><span class="color-dark">Feature</span> </a>
                                            <li class=""><a href="#"><span class="color-dark">Service</span> </a>
                                            <li class=""><a href="#"><span class="color-dark">Blog</span> </a>
                                            <li class=""><a href="#" class="mr50"><span class="color-dark">Contact</span> </a>
                                        </ul>

                                    </div>
                                </div>
                            </nav>-->

                        </div>
                    </div>

                    <div id="formLogin" class="inner cover text-center animated" data-animation="fadeIn" data-animation-delay="100">
                        <br>
                        <h3 class="font-montserrat cover-heading mb20 mt20">Login</h3>
                        <form class="clearfix mb35">
                            <div class="col-sm-8 col-sm-offset-2">
                                <input type="text" name="username1" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Username">
                            </div>
                            <div class="col-sm-8 col-sm-offset-2 mt10">
                                <input type="password" name="password2" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Password">
                            </div>
                            <div class="col-sm-8 col-sm-offset-2 mt5">
                                <button class="button button-lg button-circle button-block button-pasific hover-ripple-out">Login</button><br><br>
                                <a href="#" class="color-light mt20">Forgot Password?</a><br>
                                <a href="#" class="color-light mt20" id="showFormRegister">Register Now.</a>
                            </div>
                        </form>
                        <br>
                    </div>
                
                    <div id="formRegister" class="inner cover text-center hidden animated" data-animation="fadeIn" data-animation-delay="100">
                        <br>
                        <h3 class="font-montserrat cover-heading mb20 mt20">Register Form</h3>
                        <form class="clearfix mb35">
                            <div class="col-sm-8 col-sm-offset-2">
                                <input type="text" name="fullname" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Your fullname">
                            </div>
                            <div class="col-sm-8 col-sm-offset-2 mt10">
                                <input type="email" name="email" class="form-control text-center no-border input-lg input-circle bg-light-transparent" placeholder="Email address">
                            </div>
                            <div class="col-sm-8 col-sm-offset-2 mt5">
                                <button class="button button-lg button-circle button-block button-pasific hover-ripple-out">Register Now</button><br><br>
                                <a href="page-login-register-2.html#" class="color-light mt20" id="showFormLogin">Have an account? Login here</a><br>
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
