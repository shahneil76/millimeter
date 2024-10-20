<fieldset>
    <form
        action="{{ !empty($specification) ? route('admin.specification.update', ['specification' => $specification->id]) : route('admin.specification.store') }}"
        method="POST" id="specification-form">
        @csrf
        @if (!empty($specification))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control w-100" placeholder="Enter Name"
                        value="{{ !empty($specification->name) ? $specification->name : '' }}">
                    <span class="text-danger errors" id="nameerror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="button_link">Icon</label>
                    <div class="custom-file">
                    <input type="file" name="image_path" class="custom-file-input preview-required"
                            accept="image/png" id="image_path">
                        <label class="custom-file-label selected" for="image_path">Choose Image</label>
                    </div>
                    <span class="text-danger errors" id="image_patherror"></span>
                    @if (!empty($specification->image_path))
                        <div class="mt-3 prview-section">
                            <img class="w-100" src="{{ asset($specification->image_path) }}">
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</fieldset>
