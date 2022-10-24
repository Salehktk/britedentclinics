<div class="row mb-3">
    <div class="col-md-12 col-12">
        <x-card cardTitle="Edit specialization">
            <form action="{{ route('specialization.update', $specialization->id) }}" method="post"
                class="row g-3 needs-validation" novalidate>
                @csrf
                @method('put')
                <div class="col-md-12 mb-2">
                    <label for="edit_specialization" class="form-label mb-2">specialization: <span
                            class="text-danger">*</span></label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="edit_specialization" name="name"
                            value="{{ $specialization->name }}" placeholder="specialization" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            @if ($errors->has('name'))
                                {{ $errors->first('name') }}
                            @else
                                Please choose a specialization.
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
                </div>
            </form>
        </x-card>
    </div>
</div>
