@if ($showLabel == null)
    <x-input-label name="General dentistry categories" for="specialization_id" required="true" />
@endif
<div class="input-group has-validation">
    <select name="specialization_id" id="specialization_id" class="form-control" required>
        <option value="">Select Specialization</option>
        @foreach ($specialization as $specialize)
            <option value="{{ $specialize->id }}" {{ $specializationId == $specialize->id ? 'selected' : '' }}>
                {{ $specialize->name }}</option>
        @endforeach
    </select>
    <div class="valid-feedback">
        Looks good!
    </div>
    <div class="invalid-feedback">
        @if ($errors->has('specialization_id'))
            {{ $errors->first('specialization_id') }}
        @else
            Please choose a specialization.
        @endif
    </div>
    <input type="hidden" value="{{ $specialization }}" id="specialization_array">
</div>
