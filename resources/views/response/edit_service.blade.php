<div class="row mb-3">
    <div class="col-md-12 col-12">
        <div class="card border-0 shadow-sm p-3">
            <h5 class="card-title mb-2">Edit service</h5>
            <form action="{{ route('edit_service', $service->id) }}" method="get" class="row g-3 needs-validation" novalidate>
                
                <div class="col-md-12 mb-2">
                    <label for="edit_service" class="form-label mb-2">service: <span class="text-danger">*</span></label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="edit_service" name="name" value="{{ $service->name }}" placeholder="service"
                            required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            @if ($errors->has('name'))
                                {{ $errors->first('name') }}
                            @else
                                Please choose a service.
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