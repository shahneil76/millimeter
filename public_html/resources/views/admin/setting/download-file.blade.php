<fieldset>
    <form action="{{ route('admin.download-file.update') }}" method="POST" id="download-file-form">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="file" id="file" class="form-control">
                    <span class="text-danger errors" id="fileerror"></span>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</fieldset>

