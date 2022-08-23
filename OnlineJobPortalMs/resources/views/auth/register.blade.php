@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container py-4">

            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-primary">
                        {{Session::get('message')}}</div>
                @endif

                @if(Session::has('err_message'))
                    <div class="alert alert-danger">
                        {{Session::get('err_message')}}</div>
                @endif

                <div class="row">

                    <div class="col-md-6">
                        <img src="{{ asset('template/assets/img/reg.png ') }}" class="img-fluid">
                    </div>


                    <div class="col-md-6">
                        <div class="card border-primary">
                            <div class="mt-3 text-center card-form" style="font-weight: bold">
                                <h3>{{ __('Create a jobseeker account') }}</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">@csrf

                                <!--Make this hidden but insert into db-->
                                    <input type="hidden" value="seeker" name="user_type">
                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required
                                                   autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dob"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                                        <div class="col-md-6">
                                            <input type="text" id="datepicker"
                                                   class="form-control @error('dob') is-invalid @enderror" name="dob"
                                                   value="{{ old('dob') }}" required autocomplete="dob">

                                            @error('dob')
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
                                                   name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="gender"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                        <div class="col-md-6 mt-2">
                                            <input type="radio" name="gender" value="male" required=""> Male
                                            <input type="radio" name="gender" value="female" required=""> Female

                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-5 ml-auto mx-auto">
                                            <button type="submit" class="btn btn-secondary btn-block text-white"
                                                    style="border-radius: 50px;">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-3 ml-auto mx-auto">
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

                                <div class="col-md-8 offset-md-4 mt-3">
                                    Already have an account? <a id="rflog" href="{{route('login')}}">Login</a>
                                </div>

                            </div>
                        </div>
                    </div>

                    @include('../partials.datescript')

                </div>
            </div>
        </div>
    </div>
@endsection
