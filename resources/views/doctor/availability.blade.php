@extends('layouts.dashboard_layout')

@section('PAGE_TITLE')
    Add Doctor Availability
@endsection

@section('dashboard_content')
    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <x-card cardTitle="Doctor Specializations">
                <form action="" method="post" id="service_form" novalidate>
                    <div class="row mb-2">
                        <div class="col-12">
                            <x-specialization-list />
                            <x-input-field type="hidden" name="user_id" id="user_id" val="{{ $user->id }}"
                                place="user id" required="true" />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-md-12">
                            <x-input-label name="Select Service" for="service_id" required="true" />
                            <select id="service_id" name="service_id" class="form-control">
                                <option value="">Select specialization first</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12 col-md-6">
                            <x-time-slot-list />
                        </div>
                        <div class="col-12 col-md-6">
                            <x-input-label name="Fees ( per minutes )" for="fees" required="true" />
                            <x-input-field type="input" name="fees" id="fees" place="ex. 12" val=""
                                required="true" />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 text-end">
                            <button class="btn btn-outline-primary btn-sm" type="submit" onclick="">Add</button>
                        </div>
                    </div>
                </form>
            </x-card>
            <div id="response_doctor_specialization_services_list"></div>
        </div>

        <div class="col-md-6 mb-4">
            <x-card cardTitle="Doctor AVAILABILITY">
                <form action="{{ route('available.store') }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="row mb-2">
                        <div class="col-12 col-md-12">
                            <x-days-list />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-md-12">
                            <div class="row mt-3">
                                <div class="col-10 col-md-10">
                                    <x-input-label name="Available Time" for="name" />
                                </div>
                                <div class="col-12 col-md-2 text-end">
                                    <i class="fa fa-plus btn btn-primary btn-sm add_button"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <x-input-label name="Frome" for="from" />
                                    <x-input-field type="time" name="from[]" id="from" place="ex. Inaam ul haq"
                                        val="" required="true" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <x-input-label name="To" for="to" />
                                    <x-input-field type="time" name="to[]" id="to" place="ex. Inaam ul haq"
                                        val="" required="true" />
                                </div>
                            </div>
                            <div class="field_wrapper"></div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 text-end">
                            <x-input-field type="hidden" name="user_id" id="user_id" val="{{ $user->id }}"
                                place="user id" required="true" />
                            <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </x-card>

            @if (count($user->single_doctor->DoctorAvailableTime) > 0)
                <div class="mt-3">
                    <x-card cardTitle="Availability List">
                        <div class="accordion" id="accordionExample">
                            @foreach ($user->single_doctor->DoctorAvailableTime as $avail_time)
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="avail_{{ $avail_time->id }}Heading">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#avail_{{ $avail_time->id }}" aria-expanded="true"
                                            aria-controls="avail_{{ $avail_time->id }}">
                                            {{ $avail_time->day }}
                                        </button>
                                    </h2>
                                    <div id="avail_{{ $avail_time->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="mondayHeading" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p class="mb-2"><strong>Time Slots: </strong>{{ $avail_time->time_slots }}
                                            </p>
                                            <ul>
                                                @foreach ($avail_time->DoctorAvailableTimeSlot as $time_sltos)
                                                    <li>{{ $time_sltos->from }} to {{ $time_sltos->to }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </x-card>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('dashboard_script')
    <script>
        $(document).ready(function() {
            var id = {{ $user->single_doctor->id }}
            getDoctorSpecialization(id)

            var maxField = 10;
            var x = 1;

            //Once add button is clicked
            $('.add_button').click(function() {

                var fieldHTML = "<div class='row align-items-end mt-3 ' id='append_rows_" + x + "'>"
                fieldHTML += "<div class='col-12 col-md-6'>"
                fieldHTML +=
                    "<label class='form-label mb-2' for='from_" + x +
                    "'>From <span class='text-danger'>*</span> </label>"
                fieldHTML +=
                    "<input type='time' name='from[]' id='from_" + x +
                    "' place='ex. Inaam ul haq' class='form-control' required>"
                fieldHTML += "</div>"
                fieldHTML += "<div class='col-12 col-md-5'>"
                fieldHTML +=
                    "<label class='form-label mb-2' for='to_" + x +
                    "'>To <span class='text-danger'>*</span> </label>"
                fieldHTML +=
                    "<input type='time' name='to[]' id='to_" + x +
                    "' place='ex. Inaam ul haq' class='form-control' required>"
                fieldHTML += "</div>"
                fieldHTML += "<div class='col-12 col-md-1'>"
                fieldHTML +=
                    "<i class='fa fa-minus-circle btn btn-danger btn-sm' onclick='remove_button(" + x +
                    ")'></i>"
                fieldHTML += "</div>"
                fieldHTML += "</div>"

                $('.field_wrapper').append(fieldHTML); //Add field html

                x++; //Increment field counter

            });
        })

        function remove_button(x) {
            $('#append_rows_' + x).remove(); //Remove field html
        }

        function getDoctorSpecialization(id) {
            $.ajax({
                type: 'get',
                url: "{{ route('response_doctor_specialization_services_list') }}" + '/' + id,
                success: function(response) {
                    $('#response_doctor_specialization_services_list').html(response)
                }
            })
        }

        $('#specialization_id').on('change', function() {
            var specialization_id = $(this).val()
            var json = $('#specialization_array').val()
            $('#service_id').html('')

            const obj = JSON.parse(json);
            let optionList = document.getElementById('service_id').options;
            let options = []

            if (specialization_id == '') {
                $('#service_id').html('')
            } else {
                for (let index = 0; index < obj.length; index++) {
                    const element = obj[index];

                    if (element.id == specialization_id) {
                        element.services.forEach(serviceArr => {
                            $('#service_id').append($('<option></option>')
                                .val(serviceArr.id).html(serviceArr.name))
                        });
                    }
                }
            }
        })

        $("#service_form").on("submit", function(e) {

            e.preventDefault();

            var specialization_id = document.getElementById('specialization_id')
            var service_id = document.getElementById('service_id')
            var user_id = document.getElementById('user_id')
            var fees = document.getElementById('fees')
            var time_slots = document.getElementById('time_slots')

            var formData = {
                specialization_id: specialization_id.value,
                service_id: service_id.value,
                user_id: user_id.value,
                fees: fees.value,
                time_slots: time_slots.value,
            };

            if (service_id.value == '') {
                service_id.classList.add("is-invalid");
            }
            if (specialization_id.value == '') {
                specialization_id.classList.add("is-invalid");
            }
            if (fees.value == '') {
                fees.classList.add("is-invalid");
            }
            if (time_slots.value == '') {
                time_slots.classList.add("is-invalid");
            }

            if (service_id.value != '' && specialization_id.value != '' && fees.value != '' &&
                time_slots.value !=
                '') {

                service_id.classList.add("is-valid");
                specialization_id.classList.add("is-valid");
                fees.classList.add("is-valid");
                time_slots.classList.add("is-valid");

                service_id.classList.remove("is-invalid");
                specialization_id.classList.remove("is-invalid");
                fees.classList.remove("is-invalid");
                time_slots.classList.remove("is-invalid");

                $.ajax({
                    type: "POST",
                    url: "{{ route('doctor-specialization.store') }}",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#service_id').val('')
                        $('#fees').val(null)
                        $('#time_slots').val('')
                        $('#response_doctor_specialization_services_list').html(response)
                    }
                });
            }
        });
    </script>
@endsection
