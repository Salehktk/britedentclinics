@extends('layouts.app')
@section('styles')
    <link href="{{ asset('assets/css/offcanvas.css') }}" rel="stylesheet">

    {{-- datatable css files --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    @yield('dashboard_style')
@endsection

@section('content')
    @include('layouts.main_nav')
    @include('layouts.sub_nav')

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <h5>@yield('PAGE_TITLE')</h5>
            </div>
        </div>

        @yield('dashboard_content')
    </div>

    <section class="footer bg-dark">
        <div class="container">
            <div class="row p-2">
                <div class="col-md-12 col-12 text-white">
                    <p>2022 © {{ config('app.name') }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    {{-- dashboard chart scipts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="{{ asset('assets/js/offcanvas.js') }}"></script>

    {{-- datatables scipts --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    {{-- google map api script --}}
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5sdMWvB4J4X8W9Z6fuiNNaKI1eYUXLK4&libraries=places"></script>

    {{-- datatables scipts --}}
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            var condition = '{{ Route::currentRouteName() }}'
            if (condition != 'doctor.create') {
                sessionStorage.removeItem('user')
            }
        });
    </script>

    @yield('dashboard_script')
@endsection
