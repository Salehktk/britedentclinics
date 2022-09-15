<div class="row mb-3">
    <div class="col-md-12 col-12">
        <div class="card border-0 shadow-sm p-3">
            <h5 class="card-title mb-2">Edit Field</h5>
            <form action="{{ route('edit_field', $field->id) }}" method="get" class="row g-3 needs-validation" novalidate>
                
                <div class="col-md-12 mb-2">
                    <label for="edit_field" class="form-label mb-2">Field: <span class="text-danger">*</span></label>
                    <div class="input-group has-validation">
                        <input type="text" onfocus="get_map_field()" class="form-control" id="edit_field" name="name" value="{{ $field->name }}" placeholder="field"
                            required>
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