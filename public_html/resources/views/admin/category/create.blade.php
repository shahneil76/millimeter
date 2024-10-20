<fieldset>
    <form
        action="{{ route('admin.category.update', ['category' => $category->id]) }}"
        method="POST" id="category-form">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control w-100" placeholder="Enter Name"
                        value="{{ !empty($category->name) ? $category->name : '' }}">
                    <span class="text-danger errors" id="nameerror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="short_code">Short Code</label>
                    <input type="text" name="short_code" id="short_code" class="form-control w-100" placeholder="Enter Code"
                        value="{{ !empty($category->short_code) ? $category->short_code : '' }}">
                    <span class="text-danger errors" id="short_codeerror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control w-100" placeholder="Enter Slug"
                        value="{{ !empty($category->slug) ? $category->slug : '' }}">
                    <span class="text-danger errors" id="slugerror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control w-100" placeholder="Enter Title"
                        value="{{ !empty($category->title) ? $category->title : '' }}">
                    <span class="text-danger errors" id="titleerror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="sub_title">Sub Title</label>
                    <input type="text" name="sub_title" id="sub_title" class="form-control w-100" placeholder="Enter Sub Title"
                        value="{{ !empty($category->sub_title) ? $category->sub_title : '' }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="bolder_text">Bolder Text</label>
                    <input type="text" name="bolder_text" id="bolder_text" class="form-control w-100" placeholder="Enter Bolder Text"
                        value="{{ !empty($category->bolder_text) ? $category->bolder_text : '' }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="banner_image_link">Banner Image</label>
                    <div class="custom-file">
                    <input type="file" name="banner_image" class="custom-file-input preview-required"
                            accept="image/jpeg, image/jpg, image/png, image/webp" id="banner_image">
                        <label class="custom-file-label selected" for="banner_image">Choose Image</label>
                    </div>
                    <span class="text-danger errors" id="banner_imageerror"></span>
                    @if (!empty($category->banner_image))
                        <div class="mt-3 prview-section">
                            <img class="w-100" src="{{ asset($category->banner_image) }}">
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="button_link">Image</label>
                    <div class="custom-file">
                    <input type="file" name="image_path" class="custom-file-input preview-required"
                            accept="image/jpeg, image/jpg, image/png, image/webp" id="image_path">
                        <label class="custom-file-label selected" for="image_path">Choose Image</label>
                    </div>
                    <span class="text-danger errors" id="image_patherror"></span>
                    @if (!empty($category->image_path))
                        <div class="mt-3 prview-section">
                            <img class="w-100" src="{{ asset($category->image_path) }}">
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="6" id="description" placeholder="Enter the Description" name="description">{{ !empty($category->description) ? $category->description : '' }}</textarea>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</fieldset>

<!-- <script>
    ClassicEditor
    .create( document.querySelector( '#description' ) )
    .catch( error => {
    console.error( error );
    });
</script> -->
