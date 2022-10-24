<x-input-label name="Fields" for="field_id" required="true" />
<div class="input-group has-validation">
    <select name="field_id" id="field_id" class="form-control" required>
        <option value="">Select Field</option>
        @foreach ($fields as $field)
            <option value="{{ $field->id }}">{{ $field->name }}</option>
        @endforeach
    </select>
    <div class="valid-feedback">
        Looks good!
    </div>
    <div class="invalid-feedback">
        @if ($errors->has('field_id'))
            {{ $errors->first('field_id') }}
        @else
            Please choose a field.
        @endif
    </div>
</div>
