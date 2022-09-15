<div class="row mb-3">
    <div class="col-md-12 col-12">
        <div class="card border-0 shadow-sm p-3">
            <h5 class="card-title mb-2">Edit Category</h5>
            <form action="{{ route('edit_category', $category->id) }}" method="get" class="row g-3 needs-validation" novalidate>
                
                <div class="col-md-12 mb-2">
                    <label for="edit_category" class="form-label mb-2">Category: <span class="text-danger">*</span></label>
                    <div class="input-group has-validation">
                        <input type="text" onfocus="get_map_category()" class="form-control" id="edit_category" name="name" value="{{ $category->name }}" placeholder="category"
                            required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            @if ($errors->has('name'))
                                {{ $errors->first('name') }}
                            @else
                                Please choose a category.
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>