@extends('layouts.app')
@section('PAGE_TITLE') Reset Password @endsection
@section('content')
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-md-6">

                <div class="card mx-auto border-0 shadow" style="width: 22rem;">
                    <div class="card-body">
                        <h5 class="card-title mb-2">{{ __('Reset Password') }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Change your password</h6>
                        <hr>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}" class="row g-3 needs-validation"
                            novalidate>
                            @csrf
                            <div class="col-md-12">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="valid-feedback" role="alert">
                                    Looks good!
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        <hr>
                    <h6 class="card-subtitle mb-2 text-muted"><a href="{{ route('login') }}"> <- Back to login </a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
