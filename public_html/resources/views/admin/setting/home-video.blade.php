<fieldset>
    <form action="{{ route('admin.home-video.update') }}" method="POST" id="home-video-form">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="video">Video</label>
                    <input type="file" name="video" id="video" class="form-control">
                    <span class="text-danger errors" id="videoerror"></span>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</fieldset>

