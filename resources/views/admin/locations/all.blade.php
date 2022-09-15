@extends('layouts.dashboard_layout')

@section('PAGE_TITLE')
    Locations
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
                            @if (isset($locations))
                                <?php $sr = 1; ?>
                                @foreach ($locations as $location)
                                    <tr>
                                        <td>{{ $sr++ }}</td>
                                        <td>{{ $location->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-info" title="Edit Location"
                                                onclick="edit_location({{ $location->id }})">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                title="Delete Location" data-bs-toggle="modal"
                                                data-bs-target="#delete_location_{{ $location->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete_location_{{ $location->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="delete_location_{{ $location->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="delete_location_{{ $location->id }}Label">
                                                        Confirmation Delete Location</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure to delete your <strong>{{ $location->name }}</strong>?
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{ route('delete_location', $location->id) }}"
                                                        class="btn btn-sm btn-outline-danger" title="Delete Location">
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
                        <h5 class="card-title mb-2">New Location</h5>
                        <form action="{{ route('add_location') }}" method="post" class="row g-3 needs-validation"
                            novalidate>
                            @csrf
                            <div class="col-md-12 mb-2">
                                <label for="location" class="form-label mb-2">Location: <span class="text-danger">*</span>
                                    <small>(cities in australia)</small></label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="location" name="name"
                                        placeholder="Location" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('name'))
                                            {{ $errors->first('name') }}
                                        @else
                                            Please choose a location.
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="edit_location_response"></div>
        </div>
    </div>
@endsection

@section('dashboard_script')
    <script>
        $(document).ready(function() {
            var location = new google.maps.places.Autocomplete((document.getElementById('location')), {
                types: ['locality'],
                componentRestrictions: {
                    country: 'au'
                }
            })
        })

        function get_map_location() {
            new google.maps.places.Autocomplete((document.getElementById('edit_location')), {
                types: ['locality'],
                componentRestrictions: {
                    country: 'au'
                }
            })
        }

        function edit_location(id) {
            $.ajax({
                method: "post",
                url: "{{ route('edit_location_response') }}",
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    $('#edit_location_response').html(result)
                }
            })
        }
    </script>
@endsection
