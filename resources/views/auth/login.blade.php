{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--@endsection--}}


@extends('layouts.app_login')
@section('css')

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection
@section('content')


    <div
        style=" width:100%; background:#000 center/cover url(http://127.0.0.1:8000/assets/img/backgrounds/login.png) no-repeat !important; ;background-size:auto ">

        <div class="container">
            <div class="row" style="margin-top:14%">


                <div class="col-md-6">
                    <img style="border-style: none;" src="{{asset('assets/img/photos/2.png')}}" width="500px" alt="">

                </div>
                <div class="col-md-6">


                    <form class="login100-form validate-form rounded-10  p-3"
                          method="POST" action="{{ route('login') }}"
                          style="width: 50%; position: relative; background: #ffff; margin:78px  auto ; bottom: 0px" dir="ltr">
                        @csrf
                        <span class="login100-form-title">
						Sign in
					</span>

                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                              <input id="email" type="email" class="input100  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                              <input id="password" type="password" class="input100  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" style="background:  #00582c">
                                sign in
                            </button>
                        </div>


                    </form>

                </div>

            </div>

        </div>
    </div>
@endsection
@section('js')
@endsection
{{--    <div class="container-fluid">--}}
{{--        <div class="row no-gutter">--}}
{{--            <!-- The image half -->--}}
{{--            <div class="col-md-12 col-lg-12 col-xl-7 d-none d-md-flex bg-primary-transparent">--}}
{{--                <div class="row wd-100p mx-auto text-center">--}}
{{--                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">--}}
{{--                        <img src="https://www.spruko.com/demo/valex/Valex/assets/img/media/login.png" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- The content half -->--}}
{{--            <div class="col-md-12 col-lg-12 col-xl-5 bg-white">--}}
{{--                <div class="login d-flex align-items-center py-2">--}}
{{--                    <!-- Demo content-->--}}
{{--                    <div class="container p-0">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">--}}
{{--                                <div class="card-sigin">--}}


{{--                                    <div class="mb-5 d-flex">--}}
{{--                                        <a href="{{ url('/' . $page='index') }}">--}}
{{--                                           <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28" STYLE="COLOR:GREEN">--}}
{{--                                               Saudi Gamers Management</h1>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-sigin">--}}
{{--                                        <div class="main-signup-header">--}}
{{--                                            <h2 STYLE="COLOR:GREEN">Welcome back!</h2>--}}
{{--                                            <h5 class="font-weight-semibold mb-4">Please sign in to continue .</h5>--}}
{{--                                            <form method="POST" action="{{ route('login') }}">--}}
{{--                                                                        @csrf--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Email</label>--}}
{{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                    @error('email')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Password</label>--}}
{{--                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}
{{--                                                                                    @error('password')--}}
{{--                                                                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                                                            <strong>{{ $message }}</strong>--}}
{{--                                                                                        </span>--}}
{{--                                                                                    @enderror--}}
{{--                                                </div><button class="btn btn-main-primary btn-block">Sign In</button>--}}

{{--                                            </form>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div><!-- End -->--}}
{{--                </div>--}}
{{--            </div><!-- End -->--}}
{{--        </div>--}}
{{--    </div>--}}

