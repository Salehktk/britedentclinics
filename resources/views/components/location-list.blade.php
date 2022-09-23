<div class="col-md-12">
    <label for="location_id" class="form-label">Select Location <span class="text-danger">*</span></label>
    <select name="location_id" id="location_id" class="form-control @error('location_id') is-invalid @enderror" required
        autocomplete="current-location_id">
        <option value="">Select Your Location</option>
        @foreach ($locations as $location)
            <option value="{{ $location->id }}" {{ ($location->id == old('location_id')) ? 'selected' : '' }}>
                {{ $location->name }}</option>
        @endforeach
    </select>

    <div class="valid-feedback">
        Looks good!
    </div>
    <div class="invalid-feedback">
        @if ($errors->has('location_id'))
            {{ $errors->first('location_id') }}
        @else
            Please choose a location.
        @endif
    </div>
</div>
