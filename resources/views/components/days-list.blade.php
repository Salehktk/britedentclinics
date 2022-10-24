<x-input-label name="Doctor available days" for="day" required="true" />
<div class="input-group has-validation">
    <select name="day" id="day" class="form-control" required>
        <option value="">Select available day</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
    </select>
    <div class="valid-feedback">
        Looks good!
    </div>
    <div class="invalid-feedback">
        @if ($errors->has('day'))
            {{ $errors->first('day') }}
        @else
            Please choose a available day.
        @endif
    </div>
</div>
