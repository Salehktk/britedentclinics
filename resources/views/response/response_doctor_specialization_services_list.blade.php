@if (isset($doctor_specialization) && count($doctor_specialization) > 0)
    <div class="mt-3">
        <x-card cardTitle="Specialization List">
            <div class="row mb-2">
                <div class="col-12">
                    @foreach ($doctor_specialization as $specialization)
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header" id="{{ $specialization->Specialization->id }}_Heading">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#id_{{ $specialization->Specialization->id }}"
                                        aria-expanded="true"
                                        aria-controls="id_{{ $specialization->Specialization->id }}">
                                        {{ $specialization->Specialization->name }}
                                    </button>
                                </h2>
                                <div id="id_{{ $specialization->Specialization->id }}"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="{{ $specialization->Specialization->id }}_Heading"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <a href="javascript:void(0)" class="text-danger"
                                            onclick="delete_specialization({{ $specialization->id }})">
                                            <i class="fa fa-trash" title="Delete"></i> Delete Specialization
                                        </a>
                                        <table class="table border border-1" style="width: 100%">
                                            <tr>
                                                <th>Name</th>
                                                <th>Fees</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach ($specialization->DoctorSpecializationServices as $doctor_fields)
                                                <tr>
                                                    <td>{{ $doctor_fields->services->name }}</td>
                                                    <td>{{ $doctor_fields->fees }}</td>
                                                    <td>{{ $doctor_fields->time_slots }} Minutes</td>
                                                    <td>
                                                        <a href="javascript:void(0)"
                                                            onclick="delete_specialization_service({{ $doctor_fields->id }})">
                                                            <i class="fa fa-trash text-danger"
                                                                title="Delete {{ $doctor_fields->services->name }}"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </x-card>
    </div>
@endif

<script>
    function delete_specialization(id) {
        $.ajax({
            type: "get",
            url: "{{ route('specialization_destroy') }}" + '/' + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert('Specialization deleted.')
                location.reload();
            }
        });
    }

    function delete_specialization_service(id) {
        $.ajax({
            type: "get",
            url: "{{ route('specialization_service_destroy') }}" + '/' + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert('Specialization service deleted.')
                location.reload();
            }
        });
    }
</script>
