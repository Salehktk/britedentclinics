@extends('layouts.dashboard_layout')

@section('PAGE_TITLE')
    Add New Doctor
@endsection

@section('dashboard_content')
    <form action="{{ route('add_doctor') }}" method="post" class="row needs-validation" novalidate>
        @csrf
        <div class="row mt-4">
            <div class="col-md-6 mb-4 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-header">
                        <div class="card-title">Personal Information</div>
                    </div>
                    <div class="card-body">
                        <div class="row mx-auto">
                            <div class="col-md-4">
                                <div class=" d-flex flex-column" style="width: 150px;">
                                    <img src="{{ asset('images/doctor/profile-image.jpg') }}" alt="profile image"
                                        class="img-fluid img-thumbnail mt-4 mb-3" id="output"
                                        style="width: 150px; height:150px; z-index: 1;" required>
                                    <div id="yourBtn" class="btn btn-outline-primary btn-sm" onclick="getFile()">
                                        Edit profile image
                                    </div>
                                    <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile"
                                            type="file" accept="image/*" onchange="loadFile(event)" /></div>
                                </div>
                            </div>
                            <div class="col-md-8 mb-2">
                                <div class="row mb-2">
                                    <div class="col-md-12 col-12">
                                        <x-input-label name="Full name" for="name" />
                                        <x-input-field type="text" name="name" id="name" place="ex. Inaam ul haq"
                                            val="" />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12 col-12">
                                        <x-input-label name="Email" for="email" />
                                        <x-input-field type="email" name="email" id="email"
                                            place="ex. test@test.com" val="" />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12 col-12">
                                        <x-input-label name="Contact Number" for="phone" />
                                        <x-input-field type="phone" name="phone" id="phone" place="ex. 923136282699"
                                            val="" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-2 mx-auto">
                            <x-location-list />
                        </div>

                        <div class="row mb-2 mx-auto">
                            <div class="col-md-6 col-12">
                                <x-input-label name="Experience" for="experience" />
                                <x-input-field type="experience" name="experience" id="experience" place="ex. 2 Years"
                                    val="" />
                            </div>
                            <div class="col-md-6 col-12">
                                <x-input-label name="Degree" for="degree" />
                                <x-input-field type="degree" name="degree" id="degree" place="ex. MBBS, etc"
                                    val="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-header">
                        <div class="card-title">Availability Information</div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 mb-2">
                            <x-input-label name="Service" for="service_id" />
                            <x-services-list />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4 text-end">
                <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('dashboard_script')
    <script>
        function getFile() {
            document.getElementById("upfile").click();
        }

        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        $('#service_id').on('change', function() {
            var service_id = $(this).val()

            $.ajax({
                type: "POST",
                url: "{{ route('get_field_of_service') }}",
                data: {
                    id: service_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                }
            })
        })
    </script>
@endsection
