@extends('layouts.app')

@section('PAGE_TITLE') Registration @endsection
@section('content')
<div class="container">
    <div class="row d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-6">
            <div class="card mx-auto border-0 shadow" style="width: 22rem;">
                <div class="card-body">
                    <h5 class="card-title mb-2">{{ __('Register') }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Start your new journey with us.</h6>
                    <hr>

                    <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">{{ __('Full Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <div class="valid-feedback" role="alert">
                                Looks good!
                            </div>
                            {{-- <div class="invalid-feedback">
                                Username is required field.
                            </div> --}}
                        </div>

                        <div class="col-md-12">
                            <label for="email" class="form-label">{{ __('e-Mail') }}</label>
                            
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            {{-- <div class="invalid-feedback">
                                Password is required field.
                            </div> --}}
                        </div>

                        <div class="col-md-12">
                            <label for="password" class="form-label">Password</label>
                            
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            {{-- <div class="invalid-feedback">
                                Password is required field.
                            </div> --}}
                        </div>
                        
                        <div class="col-12">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <hr>
                    <h6 class="card-subtitle mb-2 text-muted">Already have account? <a href="{{ route('login') }}"> Login </a></h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection