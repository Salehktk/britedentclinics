<div class="input-group has-validation">
    <select name="service_id" id="service_id" class="form-control" required>
        <option value="">Select Service</option>
        @foreach ($services as $service)
            <option value="{{ $service->id }}">{{ $service->name }}</option>
        @endforeach
    </select>
    <div class="valid-feedback">
        Looks good!
    </div>
    <div class="invalid-feedback">
        @if ($errors->has('service_id'))
            {{ $errors->first('service_id') }}
        @else
            Please choose a service.
        @endif
    </div>
</div>
