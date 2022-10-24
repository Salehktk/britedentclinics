@extends('layouts.dashboard_layout')

@section('PAGE_TITLE')
    Specializations
@endsection

@section('dashboard_content')
    <div class="row mt-4">
        <div class="col-md-8 mb-4">
            <x-card cardTitle="All Specializations">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($all))
                                <?php $sr = 1; ?>
                                @foreach ($all as $specialization)
                                    <tr>
                                        <td>{{ $sr++ }}</td>
                                        <td>{{ $specialization->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-info"
                                                title="Edit specialization"
                                                onclick="edit_specialization({{ $specialization->id }})">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                title="Delete specialization" data-bs-toggle="modal"
                                                data-bs-target="#delete_specialization_{{ $specialization->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete_specialization_{{ $specialization->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="delete_specialization_{{ $specialization->id }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="delete_specialization_{{ $specialization->id }}Label">
                                                        Confirmation Delete specialization</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure to delete your
                                                        <strong>{{ $specialization->name }}</strong>?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form
                                                        action="{{ route('specialization.destroy', $specialization->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-outline-danger"
                                                            title="Delete specialization">Confirm
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
            <div id="edit_specialization_response"></div>

            <div class="row mb-3">
                <div class="col-md-12 col-12">
                    <x-card cardTitle="Add Specialization">
                        <form action="{{ route('specialization.store') }}" method="post" class="row g-3 needs-validation"
                            novalidate>
                            @csrf
                            <div class="col-md-12 mb-2">
                                <x-input-label name="Specialization" for="specialization" />
                                <x-input-field type="text" name="name" id="specialization" place="ex. Heart Surgery"
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
        function edit_specialization(id) {
            $.ajax({
                method: "post",
                url: "{{ route('edit_specialization_response') }}",
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    $('#edit_specialization_response').html(result)
                }
            })
        }
    </script>
@endsection
