<div class="accordion accordion-solid accordion-toggle-arrow" id="accordionExample3" style="display: none;">
    <div class="card">
        <div class="card-header" id="headingOne3">
            <div class="card-title" data-toggle="collapse" data-target="#summary-collapse">
                Summary
            </div>
        </div>
        <div id="summary-collapse" class="collapse show">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12">
                        <input type="text" class="form-control form-control-solid datetimepicker-input" name="date" id="media-date" placeholder="Select date & time"  data-toggle="datetimepicker" data-target="#media-date"/>
                        <span class="text-danger errors" id="dateerror"></span>
                    </div>
                    <div class="form-group col-12">
                        <label for="type">Media Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="" disabled selected>Select Type</option>
                            <option value="1" {{ (!empty($media->type) && ($media->type == "Publication")) ? "selected" : "" }}>Publication</option>
                            <option value="2" {{ (!empty($media->type) && ($media->type == "Blog")) ? "selected" : "" }}>Blog</option>
                            {{-- <option value="3" {{ (!empty($media->type) && ($media->type == "Event")) ? "selected" : "" }}>Event</option> --}}
                            <option value="4" {{ (!empty($media->type) && ($media->type == "Newsletter")) ? "selected" : "" }}>Newsletter</option>
                        </select>
                        <span class="text-danger errors" id="typeerror"></span>
                    </div>
                    <div class="form-group col-12">
                        <label for="tags">Select Tags</label>
                        <select name="tags[]" id="tags" class="form-control" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ (!empty($selected_tags) && in_array($tag->id,$selected_tags)) ? "selected" : "" }}>{{ $tag->tag_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger errors" id="tagserror"></span>
                    </div>
                    <div class="col-md-12 form-group redirection-section" style="{{ (!empty($media->type)) ? (($media->type == "Blog") ? "display:none;" : "") : "display:none;" }}">
                        <label for="redirection">Redirection URL</label>
                        <input type="text" class="form-control" name="redirection" id="redirection" placeholder="Enter Meta Title" value="{{ @$media->redirection }}">
                        <span class="text-danger errors" id="redirectionerror"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree3">
            <div class="card-title" data-toggle="collapse" data-target="#featured-image-collapse">
                Featured image
            </div>
        </div>
        <div id="featured-image-collapse" class="collapse show">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="update_image" value="{{ (isset($media->featured_image)) ? asset($media->featured_image) : "" }}">
                        <input type="file" name="featured_image" id="featured_image" style="display: none;" />
                        <img src="{{ (isset($media->featured_image)) ? asset($media->featured_image) : asset('assets/admin/media/images/blank-image.webp') }}" class="w-100 border select-image cur-pointer" id="preview-featured-image" />
                        <span class="form-text text-center text-muted">Set featured image</span>
                        <span class="text-danger errors" id="featured_imageerror"></span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="">Image caption</label>
                        <textarea class="form-control" rows="3" name="image_caption" id="image_caption">{{ @$media->image_caption }}</textarea>
                        <span class="text-danger errors" id="image_captionerror"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree3">
            <div class="card-title" data-toggle="collapse" data-target="#excerpt-collapse">
                Excerpt
            </div>
        </div>
        <div id="excerpt-collapse" class="collapse show">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <label for="">Write An Excerpt (Optional)</label>
                        <textarea class="form-control" rows="3" name="excerpt" id="excerpt">{{ @$media->excerpt }}</textarea>
                        <span class="text-danger errors" id="excerpterror"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>