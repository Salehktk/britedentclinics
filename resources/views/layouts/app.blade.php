<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('PAGE_TITLE')</title>

    {{-- bootstrap css file --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Font Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}

    @yield('styles')
</head>

<body id="page-top" class="bg-light">
    <div id="wrapper">

        @yield('content')

    </div>

    {{-- bootstrap scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    {{-- google map api script --}}
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5sdMWvB4J4X8W9Z6fuiNNaKI1eYUXLK4&libraries=places"></script>

    {{-- form validation --}}
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

    {{-- dynamic scripts for other pages --}}
    @yield('scripts')
</body>

</html>
