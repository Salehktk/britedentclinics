<div class='input-group has-validation'>
    <textarea id='{{ $id }}' name='{{ $name }}' placeholder='{{ $place }}'
        {{ $required == null ? '' : 'required' }} value='{{ $val == '' ? old($name) : $val }}' cols="30" rows="4"
        class="form-control @error($name) is-invalid @enderror"></textarea>
    <div class='valid-feedback'>
        Looks good!
    </div>
    <div class='invalid-feedback'>
        @if ($errors->has($name))
            {{ $errors->first($name) }}
        @else
            Please choose {{ $name }}.
        @endif
    </div>
</div>
