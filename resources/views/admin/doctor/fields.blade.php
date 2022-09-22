@extends('layouts.dashboard_layout')

@section('PAGE_TITLE')
    Fields
@endsection

@section('dashboard_content')
    <div class="row mt-4">
        <div class="col-md-8 mb-4">
            <div class="card border-0 shadow-sm p-3">
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
                            @if (isset($fields))
                                <?php $sr = 1; ?>
                                @foreach ($fields as $field)
                                    <tr>
                                        <td>{{ $sr++ }}</td>
                                        <td>{{ $field->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-info" title="Edit field"
                                                onclick="edit_field({{ $field->id }})">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                title="Delete field" data-bs-toggle="modal"
                                                data-bs-target="#delete_field_{{ $field->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete_field_{{ $field->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="delete_field_{{ $field->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete_field_{{ $field->id }}Label">
                                                        Confirmation Delete field</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure to delete your <strong>{{ $field->name }}</strong>?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('delete_field', $field->id) }}"
                                                        class="btn btn-sm btn-outline-danger" title="Delete field">
                                                        Confirm Delete </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="row mb-3">
                <div class="col-md-12 col-12">
                    <div class="card border-0 shadow-sm p-3">
                        <h5 class="card-title mb-2">New field</h5>
                        <form action="{{ route('add_field') }}" method="post" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-12 mb-2">
                                <label for="service_id" class="form-label mb-2">Service: <span
                                        class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <select name="service_id" id="service_id" class="form-control" required>
                                        <option value="">Select Service</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('service_id'))
                                            {{ $errors->first('service_id') }}
                                        @else
                                            Please choose a service.
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="field" class="form-label mb-2">field: <span
                                        class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="field" name="name"
                                        placeholder="field" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('name'))
                                            {{ $errors->first('name') }}
                                        @else
                                            Please choose a field.
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="edit_field_response"></div>
        </div>
    </div>
@endsection

@section('dashboard_script')
    <script>
        function edit_field(id) {
            $.ajax({
                method: "post",
                url: "{{ route('edit_field_response') }}",
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    $('#edit_field_response').html(result)
                }
            })
        }
    </script>
@endsection
