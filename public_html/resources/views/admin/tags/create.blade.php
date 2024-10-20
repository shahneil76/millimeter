<fieldset>
    <form
        action="{{ !empty($tag) ? route('admin.tag.update', ['tag' => $tag->id]) : route('admin.tag.store') }}"
        method="POST" id="tag-form">
        @csrf
        @if (!empty($tag))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="tag_name" id="tag_name" class="form-control w-100" placeholder="Enter Name"
                        value="{{ !empty($tag->tag_name) ? $tag->tag_name : '' }}">
                    <span class="text-danger errors" id="tag_nameerror"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control w-100"
                        placeholder="Enter slug" value="{{ !empty($tag->slug) ? $tag->slug : '' }}">
                    <span class="text-danger errors" id="slugerror"></span>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</fieldset>
