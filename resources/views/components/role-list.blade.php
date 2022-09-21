<div class="col-md-12">
    <label for="role" class="form-label">Select Role</label>
    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required autocomplete="current-role">
        <option value="">Select Your Role</option>
        @foreach ($roles as $role)
            <option value="{{$role->name}}">{{$role->name}}</option>
        @endforeach
    </select>
    
    <div class="valid-feedback">
        Looks good!
    </div>
    <div class="invalid-feedback">
        @if ($errors->has('role'))
            {{ $errors->first('role') }}
        @else
            Please choose a role.
        @endif
    </div>
</div>