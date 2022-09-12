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
                                            <a href="{{ $location->id }}" class="btn btn-sm btn-outline-info"
                                                title="Edit Location"> <i class="fa fa-edit"></i> </a>
                                            <a href="{{ route('delete_location', $location->id) }}"
                                                class="btn btn-sm btn-outline-danger" title="Delete Location"> <i
                                                    class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm p-3">
                <h5 class="card-title">New Location</h5>
                <form action="{{ route('add_location') }}" method="post" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="col-md-12">
                        <label for="location" class="form-label">Location: <span class="text-danger">*</span>
                            <small>(cities in australia)</small></label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="location" name="name" placeholder="Location"
                                required>
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
    </script>
@endsection
