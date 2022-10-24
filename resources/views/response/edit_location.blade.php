<div class="row mb-3">
    <div class="col-md-12 col-12">
        <x-card cardTitle="Edit Location">
            <form action="{{ route('locations.update', $location->id) }}" method="POST" class="row g-3 needs-validation"
                novalidate>
                @csrf
                @method('put')
                <div class="col-md-12 mb-2">
                    <x-input-label name="Location (cities in australia)" for="edit_location" required="true" />
                    <div class="input-group has-validation">
                        <x-input-field type="text" onfocus="get_map_location()" name="name" id="edit_location"
                            place="ex. Location" val="{{ $location->name }}" required="true" />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            @if ($errors->has('name'))
                                {{ $errors->first('name') }}
                            @else
                                Please choose a location.
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
