@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container py-5">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        @if(Session::has('message'))
                            <div class="alert alert-primary">
                                {{Session::get('message')}}
                            </div>
                        @endif

                        @if(Session::has('err_message'))
                            <div class="alert alert-danger">
                                {{Session::get('err_message')}}</div>
                        @endif

                        <div class="card border-primary">
                            <div class="mt-3 text-center card-form" style="font-weight: bold">
                                <h3>{{ __('Login') }}</h3>
                                <hr class="border-primary">
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">@csrf


                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-secondary text-white">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>

                                <hr/>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4 mt-3 ml-auto mx-auto">
                                        <a href="{{ route('fb.login') }}" class="btn btn-primary btn-block"
                                           style="border-radius: 50px;"><span><i class="fab fa-facebook-f"></i></span>
                                            {{ __('Continue with Facebook') }}
                                        </a>
                                    </div>
                                </div>


                                <div class="col-md-8 offset-md-4 mb-2 mt-2 ml-auto mx-auto" style="color: darkgrey">
                                    ----------- or continue with -----------
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-10 offset-md-2 ml-auto mx-auto">
                                        <a href="{{ route('google.login') }}" class="btn btn-outline-danger btn-block"
                                           style="border-radius: 50px;"><span><i class="fab fa-google"></i></span>
                                            {{ __('Google') }}
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" style="margin-top: -30px">
                        <img src="{{ asset('template/assets/img/access.png ') }}" class="img-fluid">
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection