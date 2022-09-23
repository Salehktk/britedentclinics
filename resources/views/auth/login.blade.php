@extends('layouts.app')

@section('PAGE_TITLE')
    Login
@endsection

@section('content')
    <div class="my-5 pt-5 ">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-5 rounded-start">
                    <div class="bg-white shadow-sm rounded-start rounded-end">
                        <div class="" style="background:#D4DBF9;">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to Doctorly.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/img/profile-img.png') }}" class="img-fluid"
                                        alt="background image">
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-12">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('email'))
                                            {{ $errors->first('email') }}
                                        @else
                                            Please choose a email.
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="password" class="form-label">Password</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @else
                                            Please choose a password.
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-sm">
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

                            <hr>
                            <h6 class="card-subtitle mb-2 ">Don't have account? <a href="{{ route('register') }}"> Create
                                    an account </a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
