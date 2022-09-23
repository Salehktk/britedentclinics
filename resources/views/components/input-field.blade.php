<div class="input-group has-validation">
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}"
        placeholder="{{ $place }}" required @error($name) is-invalid @enderror
        value="{{ $val == '' ? old($name) : $val }}">

    <div class="valid-feedback">
        Looks good!
    </div>
    <div class="invalid-feedback">
        @if ($errors->has($name))
            {{ $errors->first($name) }}
        @else
            Please choose an {{ $name }}.
        @endif
    </div>
</div>
