@extends('layouts.app')

@section('PAGE_TITLE') Registration @endsection
@section('content')
<div class="my-5 pt-5 ">
    <div class="container"> 
        <div class="row d-flex align-items-center justify-content-center" >
            <div class="col-5 rounded-start" >
                <div class="bg-white shadow-sm rounded-start rounded-end">
                    <div class="rounded-top" style="background:#D4DBF9;">
                        <div class="row">
                            <div class="col-md-7 col-12 ">
                                <div class="text-primary p-4">
                                   <h5 class="text-primary">REGISTRATION!</h5>
                                   <p>Sign up to continue to Doctorly.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ asset('assets/img/profile-img.png') }}" class="img-fluid" alt="background image">
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-12">
                                <label for="name" class="form-label">{{ __('Full Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    @if ($errors->has('name'))
                                        {{ $errors->first('name') }}
                                    @else
                                        Please choose a name.
                                    @endif
                                </div>
                            </div>
    
                            <div class="col-md-12">
                                <label for="email" class="form-label">{{ __('e-Mail') }}</label>
                                
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    @if ($errors->has('phone'))
                                        {{ $errors->first('phone') }}
                                    @else
                                        Please choose a phone.
                                    @endif
                                </div>
                            </div>
    
                            <div class="col-md-12">
                                <label for="password" class="form-label">Password</label>
                                
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
    
                            <x-role-list/>
                            
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
</div>







{{-- <div class="container">
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
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                @if ($errors->has('name'))
                                    {{ $errors->first('name') }}
                                @else
                                    Please choose a name.
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="email" class="form-label">{{ __('e-Mail') }}</label>
                            
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                            <label for="phone" class="form-label">{{ __('Phone') }}</label>
                            
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                @if ($errors->has('phone'))
                                    {{ $errors->first('phone') }}
                                @else
                                    Please choose a phone.
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="password" class="form-label">Password</label>
                            
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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

                        <x-role-list/>
                        
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
</div> --}}
@endsection