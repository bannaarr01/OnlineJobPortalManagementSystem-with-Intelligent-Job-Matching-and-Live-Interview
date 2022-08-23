@extends('layouts.main')

@section('content')
    <div class="py-5 mt-5">
        <div class="container py-5 mb-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card border-primary">
                        <div class="mt-3 card-form ml-4" style="font-weight: bold">
                            <h5>{{ __('Verify Your Email Address') }}</h5>
                        </div>
                        <hr class="border-primary"/>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-primary" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                        class="btn btn-outline-primary mt-2">{{ __('click here to request another') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
