<x-input-label name="Field Time (In Minute)" for="time_slots" required="true" />
<div class="input-group has-validation">
    <select name="time_slots" id="time_slots" class="form-control" required>
        <option value="">Time Required for field</option>
        <option value="15">15</option>
        <option value="30">30</option>
        <option value="45">45</option>
    </select>
    <div class="valid-feedback">
        Looks good!
    </div>
    <div class="invalid-feedback">
        @if ($errors->has('time_slots'))
            {{ $errors->first('time_slots') }}
        @else
            Please choose a available time slots.
        @endif
    </div>
</div>
