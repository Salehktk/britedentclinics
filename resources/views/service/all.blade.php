@extends('layouts.dashboard_layout')

@section('PAGE_TITLE')
    Services
@endsection

@section('dashboard_content')
    <div class="row mt-4">
        <div class="col-md-8 mb-4">
            <x-card cardTitle="All Services">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Specialization</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($all))
                                <?php $sr = 1; ?>
                                @foreach ($all as $service)
                                    <tr>
                                        <td>{{ $sr++ }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->specialization->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-info" title="Edit service"
                                                onclick="edit_service({{ $service->id }})">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                title="Delete service" data-bs-toggle="modal"
                                                data-bs-target="#delete_service_{{ $service->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete_service_{{ $service->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="delete_service_{{ $service->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete_service_{{ $service->id }}Label">
                                                        Confirmation Delete service</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure to delete your <strong>{{ $service->name }}</strong>?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('service.destroy', $service->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-outline-danger"
                                                            title="Delete Service">Confirm
                                                            Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </x-card>
        </div>
        <div class="col-md-4 mb-4">
            <div id="edit_service_response"></div>

            <div class="row mb-3">
                <div class="col-md-12 col-12">
                    <x-card cardTitle="Add Services">
                        <form action="{{ route('service.store') }}" method="post" class="row g-3 needs-validation"
                            novalidate>
                            @csrf
                            <div class="col-md-12 mb-2">
                                <x-specialization-list specializationId="" />
                            </div>
                            <div class="col-md-12 mb-2">
                                <x-input-label name="Service" for="service" />
                                <x-input-field type="text" name="name" id="service" place="ex. Heart Surgery"
                                    val="" required="true" />
                            </div>
                            <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
                            </div>
                        </form>
                    </x-card>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dashboard_script')
    <script>
        function edit_service(id) {
            $.ajax({
                method: "post",
                url: "{{ route('edit_service_response') }}",
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    $('#edit_service_response').html(result)
                }
            })
        }
    </script>
@endsection
