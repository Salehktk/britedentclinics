@extends('layouts.app')
@section('PAGE_TITLE')
    Reset Password
@endsection
@section('content')
    <div class="my-5 pt-5 ">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">

                <div class="col-5 rounded-start">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="bg-white shadow-sm rounded-start rounded-end">
                        <x-auth.from-header head="Reset Password" headtest="Forgot your password?" />
                        <div class="p-4">

                            <form method="POST" action="{{ route('password.email') }}" class="row g-3 needs-validation"
                                novalidate>
                                @csrf
                                <div class="col-md-12">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('email'))
                                            {{ $errors->first('email') }}
                                        @else
                                            Please choose an email.
                                        @endif
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
                            <h6 class="card-subtitle mb-2 text-muted"><a href="{{ route('login') }}"
                                    class="btn btn-primary btn-sm"> Back to login </a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
