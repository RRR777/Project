@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-lg-4">
            <div class="card card-border">
                <div class="card-body">
                    <h3 class="card-title text-center font-weight-bold">{{ __('Dashboard') }}</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="email" type="email" class="form-control custom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="password" type="password" class="form-control custom @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success btn-block font-weight-bold">
                                    {{ __('Sign In') }}
                                </button>
                            </div>

                            <div class="col-6">
                                <a class="register btn btn-primary btn-block font-weight-bold" href="{{ route('register') }}">
                                    {{ __('Sign Up') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div id="reminder" class="row justify-content-center">
    @if (Route::has('password.request'))
        {{ __('Forgot your password?') }}
        <a class="login" href="{{ route('password.request') }}">
            {{ __(' Click Here!') }}
        </a>
    @endif
</div>
@endsection
