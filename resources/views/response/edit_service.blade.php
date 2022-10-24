<div class="row mb-3">
    <div class="col-md-12 col-12">
        <x-card cardTitle="Edit service">
            <form action="{{ route('service.update', $service->id) }}" method="POST" class="row g-3 needs-validation"
                novalidate>
                @csrf
                @method('put')
                <div class="col-md-12 mb-2">
                    <x-specialization-list specializationId="{{ $service->specialization_id }}" />
                </div>
                <div class="col-md-12 mb-2">
                    <x-input-label name="service" for="edit_service" required="true" />
                    <div class="input-group has-validation">
                        <x-input-field type="text" onfocus="get_map_service()" name="name" id="edit_service"
                            place="ex. service" val="{{ $service->name }}" required="true" />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            @if ($errors->has('name'))
                                {{ $errors->first('name') }}
                            @else
                                Please choose a service.
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </div>
            </form>
        </x-card>
    </div>
</div>
