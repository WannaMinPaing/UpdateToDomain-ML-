@extends('frontendtemplate')

@section('content')

<!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('frontend_asset/img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Login</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

 <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Welcome Back</h3>
                        <!-- Login Form -->
                        <div class="login-form">

                            <form method="POST" action="{{ route('login') }}">
                            @csrf


                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Enter E-mail">
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                

                                <button type="submit" class="btn oneMusic-btn mt-30"> {{ __('Login') }}</button>
                                <p>Have an account? 
                                    <a href="{{route('register')}}">Register</a></p>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->



     <link rel="icon" href="{{asset('frontend_asset/img/core-img/favicon.ico')}}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('frontend_asset/style.css')}}">
     <script src="{{asset('frontend_asset/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('frontend_asset/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('frontend_asset/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('frontend_asset/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('frontend_asset/js/active.js')}}"></script>


@endsection

   