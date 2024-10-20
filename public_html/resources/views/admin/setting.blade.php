@extends('admin.layout.master')
@section('subheader')
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ isset($title) ? $title : '' }}</h5>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home-page-video">Home Page Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#other">Header Download File</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-page-video" role="tabpanel" aria-labelledby="other">
                            <table class="table rounded table-sm table-bordered">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>URL</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            @if (!empty($data))
                                                {{ $data->value }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.setting.home.video') }}"
                                                data-title="Home Page Video Edit"
                                                class="btn btn-icon btn-light btn-hover-primary btn-xs mx-1 modal-link"
                                                title="Edit">
                                                <i class="far fa-edit icon-sm text-primary"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other">
                            <table class="table rounded table-sm table-bordered">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            @if (!empty($download_file))
                                                <a href="{{ asset($download_file->value) }}"
                                                    class="btn btn-icon btn-light btn-hover-primary btn-xs mx-1"
                                                    title="download" download>
                                                    <i class="fas fa-file-download icon-sm text-primary"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.setting.download.file') }}"
                                                data-title="Header Download File Edit"
                                                class="btn btn-icon btn-light btn-hover-primary btn-xs mx-1 modal-link"
                                                title="Edit">
                                                <i class="far fa-edit icon-sm text-primary"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on("submit", "#home-video-form", async function(e) {
            e.preventDefault();
            var data = await ajaxDynamicMethod($(this).attr('action'), $(this).attr('method'), generateFormData(
                this));
            if (data.success) {
                toastrsuccess(data.msg);
                $('#common-modal').modal('hide');
                var table = $('#table').DataTable();
                table.ajax.reload(null, false);
            }
        });
        $(document).on("submit", "#download-file-form", async function(e) {
            e.preventDefault();
            var data = await ajaxDynamicMethod($(this).attr('action'), $(this).attr('method'), generateFormData(
                this));
            if (data.success) {
                toastrsuccess(data.msg);
                $('#common-modal').modal('hide');
                var table = $('#table').DataTable();
                table.ajax.reload(null, false);
            }
        });
    </script>
@endsection
