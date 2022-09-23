@extends('layouts.app')

@section('PAGE_TITLE') Login @endsection

@section('content')

<div class="my-5 pt-5 ">
    <div class="container"> 
        <div class="row d-flex align-items-center justify-content-center" >
            <div class="col-5 rounded-start" >
                <div class="bg-white shadow-sm rounded-start rounded-end">
                   <x-auth.from-header heading="welcom back!" header_p="Sign In To Continue" />
                    <div class="p-4">
                        <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-12">

                                <x-input-label name="Email Address" for="email" />
                                <x-input-field type="email" name="email" id="email" place="Enter Your Email"
                                    val="" />
                            </div>
                            <div class="col-md-12">
                                <x-input-label name="Password" for="password" />
                                <x-input-field type="password" name="password" id="password" place="Enter Password"
                                    val="" />
                            </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
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
                        <h6 class="card-subtitle mb-2 ">Don't have account? <a href="{{ route('register') }}"> Create an account </a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
