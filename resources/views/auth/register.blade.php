@extends('layouts.app')

@section('PAGE_TITLE')
    Registration
@endsection
@section('content')
    <div class="my-5 pt-5 ">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-5 rounded-start">
                    <div class="bg-white shadow-sm rounded-start rounded-end">
                        <x-auth.from-header head="REGISTRATION!" headtest="Start your journey with us" />
                        <div class="p-4">
                            <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
                                @csrf
                                <div class="col-md-12">
                                    <x-input-label name="Full Name" for="name" required='' />
                                    <x-input-field type="text" name="name" id="name" place="Enter Your Full Name"
                                        val="" />
                                </div>

                                <div class="col-md-12">
                                    <x-input-label name="E-Mail" for="email" required='true' />
                                    <x-input-field type="email" name="email" id="email" place="Enter Your Email"
                                        val="" />
                                </div>

                                <div class="col-md-12">
                                    <x-input-label name="Phone" for="phone" required='' />
                                    <x-input-field type="phone" name="phone" id="phone" place="Enter Your Phone Number"
                                        val="" />
                                </div>

                                <div class="col-md-12">
                                    <x-input-label name="Password" for="password" required='true' />
                                    <x-input-field type="password" name="password" id="password" place="Enter at least 8 characters password"
                                        val="" />
                                </div>
                                <x-role-list />

                                <div class="col-12">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <hr>
                            <h6 class="card-subtitle mb-2 text-muted">Already have account? <a href="{{ route('login') }}">
                                    Login </a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
