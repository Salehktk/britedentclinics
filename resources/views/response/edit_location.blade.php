<div class="row mb-3">
    <div class="col-md-12 col-12">
        <div class="card border-0 shadow-sm p-3">
            <h5 class="card-title mb-2">Edit Location</h5>
            <form action="{{ route('edit_location', $location->id) }}" method="get" class="row g-3 needs-validation" novalidate>
                
                <div class="col-md-12 mb-2">
                    <label for="edit_location" class="form-label mb-2">Location: <span class="text-danger">*</span>
                        <small>(cities in australia)</small></label>
                    <div class="input-group has-validation">
                        <input type="text" onfocus="get_map_location()" class="form-control" id="edit_location" name="name" value="{{ $location->name }}" placeholder="Location"
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