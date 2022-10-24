@extends('layouts.app')

@section('PAGE_TITLE', 'Book your appointment')

@section('content')
    <div class="mt-5 mb-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <x-appointment-booking-form patientId="{{ auth()->id() }}" />
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
