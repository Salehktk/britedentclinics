@extends('layouts.dashboard_layout')

@section('PAGE_TITLE')
    Edit Doctor
@endsection

@section('dashboard_content')
    <div class="row mt-4">
        <div class="col-md-7 mb-4 mx-auto">
            <div class="card border-0 shadow-sm p-3">
                <form action="{{ route('add_doctor') }}" method="post" class="row needs-validation" novalidate>
                    @csrf
                    <div class="row mb-2 mx-auto">
                        <div class="col-md-6 mb-2">
                            <x-input-label name="Full name" for="name" />
                            <x-input-field type="text" name="name" id="name" place="ex. Inaam ul haq"
                                val="{{ $doctor->name }}" />
                        </div>
                        <div class="col-md-6 mb-2">
                            <x-input-label name="Email" for="email" />
                            <x-input-field type="email" name="email" id="email" place="ex. test@test.com"
                                val="{{ $doctor->email }}" />
                        </div>
                    </div>

                    <div class="row mb-2 mx-auto">
                        <div class="col-md-6 mb-2">
                            <x-input-label name="Contact Number" for="phone" />
                            <x-input-field type="text" name="phone" id="phone" place="ex. 923136282699"
                                val="{{ $doctor->phone }}" />
                        </div>
                        <div class="col-md-6 mb-2">
                            <x-input-label name="Email" for="email" />
                            <x-input-field type="email" name="email" id="email" place="ex. 923136282699"
                                val="{{ $doctor->email }}" />
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-12">
                            <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('dashboard_script')
@endsection
