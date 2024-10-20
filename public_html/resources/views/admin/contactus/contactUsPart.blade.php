@extends('admin.layout.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/rowReorder.bootstrap.css') }}">
@endsection
@section('subheader')
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> {{ isset($title) ? $title : '' }} <small></small> |
                    <span class="total"></span>
                </h5>
                <!--end::Page Title-->
                <div id="kt_subheader_search_form" class="kt-margin-0-20">
                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                        <input type="text" placeholder="Search..." id="table_search" class="form-control">
                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect id="bound" x="0" y="0" width="24" height="24">
                                        </rect>
                                        <path
                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                            id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path
                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                            id="Path" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="btn-group kt-margin-l-20">
                    <select name="length_change" id="length_change"
                        class="custom-select custom-select-sm form-control form-control-sm">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                        <option>500</option>
                    </select>
                </div>
                <form action="{{ route('admin.part.export') }}" method="POST">
                    @csrf
                    <a href="#" class="btn btn-sm btn-light font-weight-bold kt-margin-l-20" id="filter_daterange"
                        data-toggle="tooltip" title="Select daterange" data-placement="right">
                        <span class="text-muted font-size-base font-weight-bold mr-2"
                            id="filter_daterange_title">Today</span>
                        <span class="text-primary font-size-base font-weight-bolder" id="filter_daterange_date">Aug
                            16</span>
                        <input type="hidden" name="start_date" id="start_date">
                        <input type="hidden" name="end_date" id="end_date">
                    </a>
                    <button class="btn btn-primary btn-sm kt-margin-l-20"><i
                            class="flaticon-download mr-2"></i>Export</button>
                </form>
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <!-- <div class="d-flex align-items-center">
                    <a href="{{ route('admin.specification.create') }}" data-title="Specification Create"
                        class="btn btn-primary font-weight-bolder btn-sm modal-link">
                        Add
                    </a>
                </div> -->
            <!--end::Toolbar-->
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-sm" id="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Phone no</th>
                                <th>Email</th>
                                <th>Comapny</th>
                                <th>City</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/admin/plugins/custom/datatables/datatables.bundle.js') }}?v=7.0.6"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/admin/js/dataTables.rowReorder.min.js') }}?v=7.0.6">
    </script>
    <script>
        $(function() {

            $("#lds-roller").show();

            var dtable = $('#table').DataTable({
                processing: false,
                serverSide: true,
                order: [],
                iDisplayLength: 100,
                dom: `tr<'row'<'col-6'i><'col-6'p>>`,
                ajax: {
                    "url": "{{ route('admin.contactus.part') }}",
                    "data": function(d) {
                        d.start_date = $("#start_date").val()
                        d.end_date = $("#end_date").val()
                    }
                },
                columns: [{
                        data: 'part_name',
                        name: 'part_name'
                    },
                    {
                        data: 'part_designation',
                        name: 'part_designation'
                    },
                    {
                        data: 'part_phoneno',
                        name: 'part_phoneno'
                    },
                    {
                        data: 'part_email',
                        name: 'part_email'
                    },
                    {
                        data: 'part_company',
                        name: 'part_company'
                    },
                    {
                        data: 'part_city',
                        name: 'part_city'
                    },
                    {
                        data: 'part_message',
                        name: 'part_message'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                drawCallback: function(settings) {
                    $("#lds-roller").hide();
                    $(".subheader .total").text(" " + this.api().page.info().recordsDisplay + " Total");
                }
            });

            $("#table_search").keyup(function(e) {
                var value = $(this).val();
                if (value.length >= 3 || e.keyCode == 13) {
                    $("#lds-roller").show();
                    dtable.search(value).draw();
                }
                if (value == "") {
                    $("#lds-roller").show();
                    dtable.search("").draw();
                }
                return;
            });

            $('#length_change').val(dtable.page.len());
            $('#length_change').change(function() {
                $("#lds-roller").show();
                dtable.page.len($(this).val()).draw();
            });

            var picker = $('#filter_daterange');
            var start = moment();
            var end = moment();

            function cb(start, end, label) {
                var title = '';
                var range = '';

                $("#start_date").val(moment(start).format("YYYY-MM-DD"));
                $("#end_date").val(moment(end).format("YYYY-MM-DD"));

                if ((end - start) < 100 || label == 'Today') {
                    title = 'Today:';
                    range = start.format('MMM D');
                } else if (label == 'Yesterday') {
                    title = 'Yesterday:';
                    range = start.format('MMM D');
                } else {
                    range = start.format('MMM D') + ' - ' + end.format('MMM D');
                }

                $('#filter_daterange_date').html(range);
                $('#filter_daterange_title').html(title);

                dtable.draw();
            }

            picker.daterangepicker({
                direction: KTUtil.isRTL(),
                startDate: start,
                endDate: end,
                opens: 'left',
                applyClass: 'btn-primary',
                cancelClass: 'btn-light-primary',
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end, '');
        });

        $(document).on("click", ".delete-part", async function(e) {
            e.preventDefault();
            var URL = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    var data = await ajaxDynamicMethod(URL, "DELETE");
                    if (data.success) {
                        toastrsuccess(data.msg);
                        var table = $('#table').DataTable();
                        table.ajax.reload(null, false);
                    }
                }
            })
        });
    </script>
@endsection
