<div class="card gutter-b">
    <div class="card-header">
        <div class="card-title mb-0">
            <h3 class="card-label mb-0">
                SEO Details
            </h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control generate-slug" name="slug" id="slug" placeholder="Enter Slug" value="{{ @$media->slug }}">
                <span class="text-danger errors" id="slugerror"></span>
            </div>
            <div class="col-md-12 form-group">
                <label for="meta_title">Meta Title</label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title" value="{{ @$media->meta_title }}">
                <span class="text-danger errors" id="meta_titleerror"></span>
            </div>
            <div class="col-md-12 form-group">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="5" placeholder="Enter Meta Description" class="form-control">{{ @$media->meta_description }}</textarea>
                <span class="text-danger errors" id="meta_descriptionerror"></span>
            </div>
        </div>
    </div>
</div>