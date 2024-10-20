<fieldset>
    <form
        action="{{ !empty($product) ? route('admin.product.update', ['product' => $product->id]) : route('admin.product.store') }}"
        method="POST" id="product-form">
        @csrf
        @if (!empty($product))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="select_category">Category</label>
                    <select name="select_category" id="select_category"
                        class="form-control">
                        <option value="" selected disabled>Select Category</option>
                        @foreach ($getCategoryData as $getCategoryDataRow)
                            <option value="{{ $getCategoryDataRow->id }}" {{ ($getCategoryDataRow->id == @$product->select_category) ? "selected" : "" }}>{{ $getCategoryDataRow->name }} {{ ((isset($getCategoryDataRow->get_parent->name)) ? "(".$getCategoryDataRow->get_parent->name.")" : "") }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger errors" id="select_categoryerror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control w-100"
                        placeholder="Enter Name" value="{{ !empty($product->name) ? $product->name : '' }}">
                    <span class="text-danger errors" id="nameerror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control w-100"
                        placeholder="Enter slug" value="{{ !empty($product->slug) ? $product->slug : '' }}">
                    <span class="text-danger errors" id="slugerror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="product_code">Code</label>
                    <input type="text" name="product_code" id="product_code" class="form-control w-100"
                        placeholder="Enter Code"
                        value="{{ !empty($product->product_code) ? $product->product_code : '' }}">
                    <span class="text-danger errors" id="product_codeerror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="matching_product_code">Matching Product Code</label>
                    <select name="matching_product_code[]" id="matching_product_code"
                        class="form-control" multiple>
                        @foreach ($getProductData as $getProductDataRow)
                            <option value="{{ $getProductDataRow->id }}" {{ ((isset($selectedProductData)) && in_array($getProductDataRow->id,$selectedProductData)) ? 'selected' : '' }}>{{ $getProductDataRow->product_code }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger errors" id="matching_product_codeerror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="matching_product_code">Matching Product Code Text</label>
                    <input type="text" name="matching_code_text" id="matching_code_text" class="form-control w-100"
                        placeholder="Enter Matching Code Text" value="{{ !empty($product->matching_code_text) ? $product->matching_code_text : '' }}">
                    <span class="text-danger errors" id="matching_code_texterror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="button_link">Thumbnail Image</label>
                    <div class="custom-file">
                        <input type="file" name="thumbnail_img" class="custom-file-input preview-required"
                            accept="image/jpeg, image/jpg, image/png, image/webp" id="thumbnail_img">
                        <label class="custom-file-label selected" for="thumbnail_img">Choose Image</label>
                    </div>
                    <span class="text-danger errors" id="thumbnail_imgerror"></span>
                    @if (!empty($product->thumbnail_img))
                        <div class="mt-3 prview-section">
                            <img class="w-100" src="{{ asset($product->thumbnail_img) }}">
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="button_link">Image One</label>
                    <div class="custom-file">
                        <input type="file" name="image1" class="custom-file-input preview-required"
                            accept="image/jpeg, image/jpg, image/png, image/webp" id="image1">
                        <label class="custom-file-label selected" for="image1">Choose Image</label>
                    </div>
                    <span class="text-danger errors" id="image1error"></span>
                    @if (!empty($product->image1))
                        <div class="mt-3 prview-section">
                            <img class="w-100" src="{{ asset($product->image1) }}">
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="button_link">Image Two</label>
                    <div class="custom-file">
                        <input type="file" name="image2" class="custom-file-input preview-required"
                            accept="image/jpeg, image/jpg, image/png, image/webp" id="image2">
                        <label class="custom-file-label selected" for="image2">Choose Image</label>
                    </div>
                    @if (!empty($product->image2))
                        <div class="mt-3 prview-section">
                            <img class="w-100" src="{{ asset($product->image2) }}">
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="button_link">Image Three</label>
                    <div class="custom-file">
                        <input type="file" name="image3" class="custom-file-input preview-required"
                            accept="image/jpeg, image/jpg, image/png, image/webp" id="image3">
                        <label class="custom-file-label selected" for="image3">Choose Image</label>
                    </div>
                    @if (!empty($product->image3))
                        <div class="mt-3 prview-section">
                            <img class="w-100" src="{{ asset($product->image3) }}">
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="specifications_id">Specification</label>
                    <select name="specifications_id[]" id="specifications_id"
                        class="form-control" multiple>
                        @foreach ($getSpecificationData as $getSpecificationDataRow)
                            <option value="{{ $getSpecificationDataRow->id }}" {{ ((isset($selectedSpecificationData)) && in_array($getSpecificationDataRow->id,$selectedSpecificationData)) ? 'selected' : '' }}>{{ $getSpecificationDataRow->name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger errors" id="specifications_iderror"></span>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control description" id="description" placeholder="Enter the Description" name="description">{{ !empty($product->description) ? $product->description : '' }}</textarea>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</fieldset>


<script>
    $(document).ready(function() {
        $("#description").summernote({
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen']], /* , 'codeview' */
                ['table', ['table']],
            ]
        });

        $("#select_category").select2();
        $("#matching_product_code").select2({
            placeholder : "Select Product Code"
        });
        $("#specifications_id").select2({
            placeholder : "Select Specification"
        });
    });
</script>
