@extends('layouts.main')

@section('content')

    <div class="py-5 mt-5">
        <div class="container py-5">

            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-6">
                        <img src="{{ asset('template/assets/img/empreg.png ') }}" class="img-fluid">
                    </div>

                    <div class="col-md-6">
                        @if(Session::has('message'))
                            <div class="alert alert-primary">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <div class="card border-primary">
                            <div class="mt-3 text-center card-form" style="font-weight: bold">
                                <h3>{{ __('Employer Registration (it\'s free)') }}</h3>
                                <hr class="border-primary">
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('emp.register') }}">@csrf

                                    <input type="hidden" value="employer" name="user_type">
                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="cname" type="text"
                                                   class="form-control @error('cname') is-invalid @enderror"
                                                   name="cname" value="{{ old('cname') }}" required autocomplete="cname"
                                                   autofocus>

                                            @error('cname')
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


                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-block"
                                                    style="border-radius: 50px;">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <hr>

                                <div class="col-md-8 offset-md-4 mt-3">
                                    Already have an account? <a id="rflog" href="{{route('login')}}">Login</a>
                                </div>
                                <div class="col-md-8 offset-md-3">To manage job posting and applicants</div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
