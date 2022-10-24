@if ($showLabel == null)
    <x-input-label name="Select Location" for="location_id" required="true" />
@endif
<select name="location_id" id="location_id" class="form-control @error('location_id') is-invalid @enderror" required
    autocomplete="current-location_id">
    <option value="">Select Your Location</option>
    @foreach ($locations as $location)
        <option value="{{ $location->id }}" {{ $location->id == old('location_id') ? 'selected' : '' }}>
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
