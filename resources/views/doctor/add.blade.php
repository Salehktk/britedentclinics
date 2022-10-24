@extends('layouts.dashboard_layout')

@section('PAGE_TITLE')
    Add New Doctor
@endsection

@section('dashboard_content')
    <div class="row mt-4">
        <div class="col-md-6 mb-4 mx-auto">
            <x-card cardTitle="Doctor Information">
                <form action="{{ route('doctor.store') }}" method="post" class="needs-validation" enctype="multipart/form-data"
                    novalidate>
                    @csrf
                    <div class="row mx-auto">
                        <div class="col-md-4">
                            <div class=" d-flex flex-column" style="width: 150px;">
                                <img src="{{ asset('images/doctor/profile-image.jpg') }}" alt="profile image"
                                    class="img-fluid img-thumbnail mt-4 mb-3" id="output"
                                    style="width: 150px; height:150px; z-index: 1;" required>
                                <div id="yourBtn" class="btn btn-outline-primary btn-sm" onclick="getFile()">
                                    Edit profile image
                                </div>
                                <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile" name="profile"
                                        type="file" accept="image/*" onchange="loadFile(event)" /></div>
                            </div>
                        </div>
                        <div class="col-md-8 mb-2">
                            <div class="row mb-2">
                                <div class="col-md-12 col-12">
                                    <x-input-label name="Full name" for="name" required="true" />
                                    <x-input-field type="text" name="name" id="name" place="ex. Inaam ul haq"
                                        val="" required="true" />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12 col-12">
                                    <x-input-label name="Email" for="email" required="true" />
                                    <x-input-field type="email" name="email" id="email" place="ex. test@test.com"
                                        val="" required="true" />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12 col-12">
                                    <x-input-label name="Contact Number" for="phone" required="true" />
                                    <x-input-field type="phone" name="phone" id="phone" place="ex. 923136282699"
                                        val="" required="true" />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-2 mx-auto">
                        <div class="col-md-12 col-12">
                            <x-input-label name="Title" for="title" required="true" />
                            <x-input-field type="text" name="title" id="title" place="ex. Title" val=""
                                required="true" />
                        </div>
                    </div>
                    <div class="row mb-2 mx-auto">
                        <div class="col-md-12 col-12">
                            <x-input-label name="Short Description" for="short_description" required="true" />
                            <x-test-area-field name="short_description" id="short_description" place="ex. Short description"
                                val="" required="true" />
                        </div>
                    </div>
                    <div class="row mb-2 mx-auto">
                        <div class="col-md-12 col-12">
                            <x-location-list />
                        </div>
                    </div>

                    <div class="row mb-2 mx-auto">
                        <div class="col-md-6 col-12">
                            <x-input-label name="Experience" for="experience" required="true" />
                            <x-input-field type="experience" name="experience" id="experience" place="ex. 2 Years"
                                val="" required="true" />
                        </div>
                        <div class="col-md-6 col-12">
                            <x-input-label name="Degree" for="degree" required="true" />
                            <x-input-field type="degree" name="degree" id="degree" place="ex. MBBS, etc"
                                val="" required="true" />
                        </div>
                    </div>
                    <div class="row mb-2 mx-auto">
                        <div class="col-12 text-end">
                            <x-input-field type="hidden" name="user_id" id="user_id" place="ex. Inaam ul haq"
                                val="" required="true" />
                            <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
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

        $(document).ready(function() {
            get_user()
        })

        function get_user() {
            var user_id = sessionStorage.getItem("user")

            $.ajax({
                type: 'get',
                url: "{{ route('get_user_data_ajax') }}" + '/' + user_id,
                success: function(response) {
                    $('#name').val(response.name)
                    $('#email').val(response.email)
                    $('#phone').val(response.phone)
                    $('#user_id').val(response.id)
                }
            })
        }
    </script>
@endsection
