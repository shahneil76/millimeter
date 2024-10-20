@extends('admin.layout.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/dataTables.bootstrap4.min.css') }}">
    <style>
        [contenteditable=true]:empty:before {
            content: attr(placeholder);
            pointer-events: none;
            display: block;
            /* For Firefox */
        }

        [contenteditable=true] {
            outline: 0px solid transparent;
        }

        .popover-body a.col-md-6,
        .popover-body a.col-md-6 i {
            color: #181C32;
        }

        .popover-body a.col-md-6:hover,
        .popover-body a.col-md-6:hover i {
            color: #1e5677;
        }

        #block-selection a.col-md-3:hover .card-border {
            border-color: #1e5677 !important;
        }


        .builder-container .ck-content.ck-focused {
            border-color: white !important;
        }

        .builder-container .ck-content {
            min-height: unset !important
        }

        .builder-container .note-editor.note-frame .note-placeholder,
        .builder-container .note-editor.note-airframe .note-placeholder {
            padding: 0px !important;
        }

        .builder-container blockquote {
            font-size: 24px !important;
            line-height: 1.2 !important;
            font-weight: 600 !important;
            text-transform: none !important;
            color: #1e5677;
            margin-bottom: 0;
        }

        .builder-container h1:first-child {
            font-size: 32px;
            font-weight: bold;
            margin: 30px 0;
        }

        .paragraph-editor-box [aria-label="More Color"]::after,
        .heading-editor-box [aria-label="More Color"]::after {
            margin-left: 0px !important;
        }

        .heading-editor-box [contenteditable=true] {
            line-height: 2.3em;
        }

        .popover-body .card .card-body {
            padding: 15px 0px;
        }

        .image-editor-box img:hover {
            cursor: pointer;
        }

        .image-editor-box img {
            border: 1px solid #e8e8e8;
        }

        .paragraph-editor-box,
        .heading-editor-box,
        .quote-editor-box,
        .image-editor-box {
            margin-bottom: 10px;
            position: relative;
        }

        .quote-editor-box .note-editor.note-airframe .note-editing-area .note-editable {
            overflow: hidden;
        }

        .quote-editor-box .note-editing-area {
            line-height: 2.3em;
        }

        .toolbar {
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 94;
        }

        .sn-checkbox-use-protocol {
            display: none;
        }

        /* .bootstrap-datetimepicker-widget
            {
                z-index: 1;
            } */
    </style>
@endsection
@section('subheader')
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
                <!--end::Page Title-->

            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <button class="btn btn-light-primary font-weight-bolder btn-sm save-media mr-2">
                    Publish
                </button>
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
@endsection
@section('content')
    <form action="{{ !empty($media) ? route('admin.media.update', ['medium' => $media->id]) : route('admin.media.store') }}"
        method="POST" id="media-form" class="row">
        @if (!empty($media))
            @method('put')
        @endif
        <div class="col-xl-9 col-lg-9 col-md-8 col-8 main-content-penal">
            <div class="card gutter-b">
                <div class="card-body">
                    <div class="col-12 builder-container">
                        <input type="file" style="display: none;" id="image-uploader" accept="image/*">
                        <h1 contenteditable="true" id="title" class="mb-5" placeholder="Add title">{{ isset($media->title) ? $media->title : '' }}</h1>
                        <span class="text-danger errors" id="titleerror"></span>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-xs btn-icon btn-dark" data-toggle="popover"
                            data-trigger="focus" data-placement="bottom" title="Select Block" data-html="true"
                            data-content='<div class="row">
                            <a href="paragraph" class="col-md-6 mb-5 section-box" data-section="paragraph">
                                <div class="card card-custom card-border">
                                    <div class="card-body text-center">
                                        <i class="fas fa-paragraph icon-2x"></i>
                                        <p class="mb-0">Paragraph</p>
                                    </div>
                                </div>
                            </a>
                            <a href="heading" class="col-md-6 mb-5 section-box" data-section="heading">
                                <div class="card card-custom card-border">
                                    <div class="card-body text-center">
                                        <i class="fas fa-heading icon-2x"></i>
                                        <p class="mb-0">Heading</p>
                                    </div>
                                </div>
                            </a>
                            <a href="image" class="col-md-6 section-box" data-section="image">
                                <div class="card card-custom card-border">
                                    <div class="card-body text-center">
                                        <i class="far fa-image icon-2x"></i>
                                        <p class="mb-0">Image</p>
                                    </div>
                                </div>
                            </a>
                            <a href="blockquote" class="col-md-6 section-box" data-section="blockquote">
                                <div class="card card-custom card-border">
                                    <div class="card-body text-center">
                                        <i class="fas fa-quote-left icon-2x"></i>
                                        <p class="mb-0">Quote</p>
                                    </div>
                                </div>
                            </a>
                        </div>'>
                            <i class="flaticon2-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="d-none" id="handle-edit-image">

                </div>
            </div>
            @include('admin.media._seo')
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-4 sidebar">
            <div class="card sidebar__sticky">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-right mb-5">
                            <button class="btn btn-icon btn-xs btn-primary sidebar-btn">
                                <i class="flaticon2-right-arrow"></i>
                            </button>
                        </div>
                    </div>
                    @include('admin.media._right')
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-lg-1 col-md-1 col-1 sidebar-preview" style="display: none;">
            <div class="card sidebar__sticky">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-icon btn-xs btn-primary sidebar-btn">
                                <i class="flaticon2-left-arrow"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ asset('assets/admin/plugins/custom/draggable/draggable.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js?v=7.0.6') }}"></script>
    @if (isset($media))
        <script src="{{ asset('assets/admin/plugins/global/he.min.js') }}"></script>
    @endif
    <script>
        var eventCategoryId = "8";
        var parentAutomation = false;
        $('#title').on('paste', function(e) {
            e.preventDefault();
            const clipboardData = e.originalEvent.clipboardData || window.clipboardData;
            const plainText = clipboardData.getData('text/plain');
            document.execCommand('insertText', false, plainText);
        });

        var editPrimaryCatgeoryId = "{{ @$primary_category->id }}";

        function manageParent(value)
        {
            if (parentAutomation) 
            {
                var perentId = value.data('parent');
                if ((perentId != "") && (perentId != null) && (perentId != undefined)) 
                {
                    if(value.prop('checked') == true)
                    {
                        $(".level-"+perentId).prop("checked",true).trigger('change');
                    }
                    else
                    {
                        if ($(".level-group-of-"+perentId+":checked").length == 0) 
                        {
                            $(".level-"+perentId).prop("checked",false).trigger('change');
                        }
                    }
                }
            }
        }

        $(document).on('change', '.category-checkbox', function() {
            manageParent($(this));
            var selecedId = ($('#primary_category').val() != null) ? $('#primary_category').val() : ((
                editPrimaryCatgeoryId != "") ? editPrimaryCatgeoryId : '');
            $('#primary_category').empty().trigger('change');
            var options = [];
            $(".category-checkbox").each(function(index, value) {
                if ($(value).prop('checked')) {
                    options.push({
                        id: $(this).val(),
                        name: $(this).parent().text().trim()
                    });
                }
            });
            var newOption = new Option("Select Primary category", "", true, true);
            $(newOption).attr('disabled', true);
            $('#primary_category').append(newOption);

            options.forEach(element => {
                var newOption = new Option(element.name, element.id, ((selecedId == element.id) ? true :
                    false), ((selecedId == element.id) ? true : false));
                $('#primary_category').append(newOption);
            })
            $('#primary_category').trigger('change');
        });

        function setContent() {
            var content = "";
            $(".builder-container .draggable").each(function(index, value) {
                if ($(value).hasClass('image-editor-box') && $(value).hasClass('paragraph-editor-box')) {
                    if ($(this).find('img').attr('src') !=
                        "{{ asset('assets/admin/media/images/blank-image.webp') }}") {
                        content += `<!-- dhn:image -->`;
                        content +=
                            `<div style="${($(this).attr('style') != undefined) ? $(this).attr('style') : ''}" class="${(($(this).hasClass('d-flex')) ? 'd-flex ' : '') + (($(this).hasClass('justify-content-start')) ? 'justify-content-start ' : '') + (($(this).hasClass('justify-content-center')) ? 'justify-content-center ' : '') + (($(this).hasClass('justify-content-end')) ? 'justify-content-end ' : '')}">`;
                        content +=
                            `<div style="${($(this).find('.handle-box').attr('style') != undefined) ? $(this).find('.handle-box').attr('style') : ''}">`;
                        content += `<figure>`;
                        content +=
                            `<img src="${$(this).find('img').attr('src')}" style="width:100%;${($(this).find('img').attr('style') != undefined) ? $(this).find('img').attr('style') : ''}" />`;
                        if ($(this).find('.editor-div').summernote('code') != "<p><br></p>" && $(this).find(
                                '.editor-div').summernote('code') != "<br>") {
                            content += `<figcaption>`;
                            content += `${$(this).find('.editor-div').summernote('code')}`;
                            content += `</figcaption>`;
                        }
                        content += `</figure>`;
                        content += `</div>`;
                        content += `</div>`;
                        content += `<!-- dhn:image -->`;
                    }
                } else {
                    if ($(value).find('.editor-div').summernote('code') != "<p><br></p>" && $(value).find(
                            '.editor-div').summernote('code') != "<br>") {
                        if ($(value).hasClass('paragraph-editor-box')) {
                            content += "<!-- dhn:paragraph -->";
                            content += $(value).find('.editor-div').summernote('code');
                            content += "<!-- dhn:paragraph -->";
                        } else if ($(this).hasClass('heading-editor-box')) {
                            content += "<!-- dhn:heading -->";
                            content += $(value).find('.editor-div').summernote('code');
                            content += "<!-- dhn:heading -->";
                        } else if ($(this).hasClass('quote-editor-box')) {
                            content += "<!-- dhn:blockquote -->";
                            content += $(value).find('.editor-div').summernote('code');
                            content += "<!-- dhn:blockquote -->";
                        }
                    }
                }
            });
            return content;
        }

        $(document).on('click', '.save-media', function(e) {
            e.preventDefault();
            $("#media-form").submit();
        });
        $(document).on('change', '#type', function(e) {
            e.preventDefault();
            if ($(this).val() == "2") 
            {
                $("#redirection").val("");
                $(".redirection-section").hide();
            }
            else
            {
                $(".redirection-section").show();
            }
        });

        $(document).on("submit", "#media-form", async function(e) {
            e.preventDefault();
            var formData = generateFormData(this);
            var content = setContent();
            formData.append('title', $("#title").text().trim());
            formData.append('content', content);
            var data = await ajaxDynamicMethod($(this).attr('action'), $(this).attr('method'), formData);
            if (data.error) {
                if (data.errors.content && (data.errors.content[0] == "Required")) {
                    toastrerror("Please add some block.");
                }
            }
            else if (data.success && data.msg) 
            {
                toastrsuccess(data.msg);
            }
        })

        $(document).on('click', '.sidebar-btn', function(e) {
            e.preventDefault();
            if ($('.main-content-penal').hasClass('col-xl-9')) {
                $('.main-content-penal').removeClass('col-xl-9 col-lg-9 col-md-8 col-8');
                $('.main-content-penal').addClass('col-xl-11 col-lg-11 col-md-11 col-11');
                $(".sidebar").hide();
                $(".sidebar-preview").show();
            } else {
                $('.main-content-penal').removeClass('col-xl-11 col-lg-11 col-md-11 col-11');
                $('.main-content-penal').addClass('col-xl-9 col-lg-9 col-md-8 col-8');
                $(".sidebar").show();
                $(".sidebar-preview").hide();
            }
        });


        var ids = [];
        var swappable = "";
        var eventTriggerForImage = "";

        async function generateUniqueID() {
            var randomNumber = Math.floor(Math.random() * 1000);
            if ($.inArray(randomNumber, ids) !== -1) {
                randomNumber = await generateUniqueID();
                return false;
            }
            ids.push(randomNumber);
            return randomNumber;
        }

        function paragraphBlockAssign(className, isWithAlignment) {
            if (isWithAlignment && isWithAlignment == 'no') {
                $("." + className).summernote({
                    airMode: true,
                    placeholder: 'Image caption...',
                    popover: {
                        air: [
                            ['insert', ['link']],
                        ]
                    },
                    callbacks: {
                        onPaste: function(e) {
                            e.preventDefault();
                            const text = (e.originalEvent || e).clipboardData.getData('text/plain').trim();
                            document.execCommand('insertText', false, text);
                        }
                    }
                });
            } else {
                $("." + className).summernote({
                    airMode: true,
                    placeholder: 'Enter your text here...',
                    popover: {
                        air: [
                            // ['color', ['color']],
                            // ['style', ['bold', 'italic', 'underline']],
                            ['para', ['paragraph']],
                            ['insert', ['link']],
                        ]
                    },
                    callbacks: {
                        onPaste: function(e) {
                            e.preventDefault();
                            const text = (e.originalEvent || e).clipboardData.getData('text/plain').trim();
                            document.execCommand('insertText', false, text);
                        }
                    }
                });
            }
        }

        function headingBlockAssign(className, id) {
            $("." + className).summernote({
                airMode: true,
                placeholder: '<h2>Heading</h2>',
                popover: {
                    air: [
                        ['style', ['style']],
                        // ['color', ['color']],
                        // ['style', ['bold', 'italic', 'underline']],
                        ['para', ['paragraph']],
                        ['insert', ['link']],
                    ]
                },
                callbacks: {
                    onPaste: function(e) {
                        e.preventDefault();
                        const text = (e.originalEvent || e).clipboardData.getData('text/plain').trim();
                        debugger
                        document.execCommand('insertText', false, text);
                    }
                }
            });
        }

        function quoteBlockAssign(className, id) {
            $("." + className).summernote({
                airMode: true,
                placeholder: '<blockquote class="blockquote">Quote</blockquote>',
                popover: {
                    air: [
                        // ['style', ['style']],
                        // ['color', ['color']],
                        // ['style', ['bold', 'italic', 'underline']],
                        ['para', ['paragraph']],
                        ['insert', ['link']],
                    ]
                },
                callbacks: {
                    onPaste: function(e) {
                        e.preventDefault();
                        const text = (e.originalEvent || e).clipboardData.getData('text/plain').trim();
                        document.execCommand('insertText', false, text);
                    }
                }
            });
        }

        function imageBlockAssign(id) {

        }

        $(document).on('summernote.change', ".quote-editor", function(we, contents, $editable) {
            if ($(this).parent().data('changed') && ((!contents.includes("<blockquote")) && (!contents.includes(
                    "</blockquote>")))) {
                $(this).summernote('formatBlock', '<blockquote>');
                $(this).parent().data('changed', false);
            } else if (contents == "<br>") {
                $(this).parent().data('changed', true);
            }
            else if (contents == "<blockquote><br></blockquote>") 
            {
                $(this).summernote('code', "<br>");
            }
        });

        $(document).on('summernote.change', ".heading-editor", function(we, contents, $editable) {
            if ($(this).parent().data('changed') && ((!contents.includes("<h2>")) && (!contents.includes(
                "<h2>")))) {
                $(this).summernote('formatH2');
                $(this).parent().data('changed', false);
            } else if (contents == "<br>") {
                $(this).parent().data('changed', true);
            }
            else if (contents == "<h2><br></h2>") 
            {
                $(this).summernote('code', "<br>");
            }
        });

        $(document).on('click', '.change-width', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var width = $(this).data('width');
            $(".image-editor-box.editor-" + id + ' .handle-box').css('width', width + '%');
        });

        $(document).on('click', '.delete-btn', function(e) {
            var id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "You will not be able to recover this section!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, proceed!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $(".editor-"+id).remove();
                    refreshDragable();
                }
            });
        });

        $(document).on('click', '.change-alignment', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var align = $(this).data('align');
            $(".image-editor-box.editor-" + id).removeClass(
                'd-flex justify-content-center justify-content-start justify-content-end');
            if (align == 'center') {
                $(".image-editor-box.editor-" + id).addClass('d-flex justify-content-center');
            } else if (align == 'flex-start') {
                $(".image-editor-box.editor-" + id).addClass('d-flex justify-content-start');
            } else if (align == 'flex-end') {
                $(".image-editor-box.editor-" + id).addClass('d-flex justify-content-end');
            }
            // $(".image-editor-box.editor-"+id).css('justify-content', align);
        });

        $(document).on('click', '.change-round', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var round = $(this).data('round');
            if (round == 'yes') {
                $(".image-editor-box.editor-" + id + " img").css('border-radius', '15px');
            } else {
                $(".image-editor-box.editor-" + id + " img").css('border-radius', '0px');
            }
        });

        $(document).on('click', '.change-image-btn', function(e) {
            eventTriggerForImage = $(this).data('id');
            $("#image-uploader").trigger('click');
        });

        function refreshDragable() {
            if (swappable != "") {
                swappable.destroy();
            }
            var containers = document.querySelectorAll('.builder-container');

            if (containers.length === 0) {
                return false;
            }

            swappable = new Sortable.default(containers, {
                draggable: '.draggable',
                handle: '.draggable .sort-btn',
                mirror: {
                    //appendTo: selector,
                    appendTo: 'body',
                    constrainDimensions: true
                }
            });
        }

        async function setImage(file, id) {
            var formData = new FormData();
            formData.append('image', file);
            var data = await ajaxDynamicMethod("{{ route('admin.imageupload') }}", "POST", formData);
            if (data.success) {
                $(".editor-" + id).find('.trigger-image').attr('src', data.data.path);
            }
        }

        $(document).on('change', '#image-uploader', function(e) {   
            if ($(this).val() != "") {
                setImage(e.target.files[0], eventTriggerForImage);
            } else {
                $(".editor-" + eventTriggerForImage).find('.trigger-image').attr('src',
                    "{{ asset('assets/admin/media/images/blank-image.webp') }}");
            }
        });

        async function setSection(section, value = null) {
            var uId = await generateUniqueID();
            switch (section) {
                case "paragraph":
                    $(".builder-container").append(`<div class="paragraph-editor-box editor-${uId} draggable" data-id="${uId}">
                            <div class="toolbar">
                                <button type="button" class="btn btn-xs btn-icon btn-dark sort-btn">
                                    <i class="flaticon2-sort"></i>
                                </button>
                                <button type="button" class="btn btn-xs btn-icon btn-danger delete-btn" data-id="${uId}">
                                    <i class="flaticon-delete"></i>
                                </button>
                            </div>
                            <div class="paragraph-editor editor-div editor-div-${uId}">${(value != null) ? value : ''}</div>
                        </div>`);
                    paragraphBlockAssign(`editor-div-${uId}`);
                    break;
                case "heading":
                    $(".builder-container").append(`<div class="heading-editor-box editor-${uId} draggable" data-id="${uId}" data-changed="true">
                        <div class="toolbar">
                                <button type="button" class="btn btn-xs btn-icon btn-dark sort-btn">
                                    <i class="flaticon2-sort"></i>
                                </button>
                                <button type="button" class="btn btn-xs btn-icon btn-danger delete-btn" data-id="${uId}">
                                    <i class="flaticon-delete"></i>
                                </button>
                            </div>
                            <div class="heading-editor editor-div editor-div-${uId}">${(value != null) ? value : ''}</div>
                        </div>`);
                    headingBlockAssign(`editor-div-${uId}`, uId);
                    break;
                case "image":
                    $(".builder-container").append(`<div class="paragraph-editor-box w-100 image-editor-box editor-${uId} draggable ${((value != null) && (value.boxclass != "") && (value.boxclass != null) && (value.boxclass != undefined)) ? value.boxclass : ''}" data-id="${uId}" style="${((value != null) && (value.boxstyle != "") && (value.boxstyle != null) && (value.boxstyle != undefined)) ? value.boxstyle : 'display : flex;'}">
                        <div class="toolbar">
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-dark btn-icon btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item change-width" data-width="25" data-id="${uId}" href="/change-width">Width : 25%</a>
                                        <a class="dropdown-item change-width" data-width="50" data-id="${uId}" href="/change-width">Width : 50%</a>
                                        <a class="dropdown-item change-width" data-width="100" data-id="${uId}" href="/change-width">Width : 100%</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item change-alignment" data-align="flex-start" data-id="${uId}" href="/change-alignment">Left</a>
                                        <a class="dropdown-item change-alignment" data-align="center" data-id="${uId}" href="/change-alignment">Center</a>
                                        <a class="dropdown-item change-alignment" data-align="flex-end" data-id="${uId}" href="/change-alignment">Right</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item change-round" data-round="yes" data-id="${uId}" href="/change-round">Rounded</a>
                                        <a class="dropdown-item change-round" data-round="no" data-id="${uId}" href="/change-round">Not Rounded</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-xs btn-icon btn-dark change-image-btn" data-id="${uId}">
                                    <i class="flaticon2-image-file"></i>
                                </button>
                                <button type="button" class="btn btn-xs btn-icon btn-dark sort-btn">
                                    <i class="flaticon2-sort"></i>
                                </button>
                                <button type="button" class="btn btn-xs btn-icon btn-danger delete-btn" data-id="${uId}">
                                    <i class="flaticon-delete"></i>
                                </button>
                            </div>
                            <div class="handle-box" style="${((value != null) && value.handleboxstyle && value.handleboxstyle != "" && value.handleboxstyle != null && value.handleboxstyle != undefined) ? value.handleboxstyle : 'width : 50%;'}">
                                <figure>
                                    <img src="${((value != null) && value.src && value.src != "" && value.src != null && value.src != undefined) ? value.src : "{{ asset('assets/admin/media/images/blank-image.webp') }}"}" class="trigger-image w-100 mb-3" style="${((value != null) && value.imagestyle && value.imagestyle != "" && value.imagestyle != null && value.imagestyle != undefined) ? value.imagestyle : ''}" />
                                    <figcaption>
                                        <div class="paragraph-editor editor-div editor-div-${uId}">${((value != null) && value.paragraph && value.paragraph != "" && value.paragraph != null && value.paragraph != undefined) ? value.paragraph : ''}</div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>`);
                    imageBlockAssign(uId);
                    paragraphBlockAssign(`editor-div-${uId}`, 'no');
                    break;
                case "blockquote":
                    $(".builder-container").append(`<div class="quote-editor-box editor-${uId} draggable" data-id="${uId}" data-changed="true">
                        <div class="toolbar">
                                <button type="button" class="btn btn-xs btn-icon btn-dark sort-btn">
                                    <i class="flaticon2-sort"></i>
                                </button>
                                <button type="button" class="btn btn-xs btn-icon btn-danger delete-btn" data-id="${uId}">
                                    <i class="flaticon-delete"></i>
                                </button>
                            </div>
                            <div class="quote-editor editor-div editor-div-${uId}">${(value != null) ? value : ''}</div>
                        </div>`);
                    quoteBlockAssign(`editor-div-${uId}`, uId);
                    break;
                default:
                    console.warn("Missing Sections :" + section);
                    break;
            }

            refreshDragable()
        }

        $(document).on('click', '.section-box', async function(e) {
            e.preventDefault();
            var section = $(this).attr('href');
            setSection(section);
        });

        if ("{{ !empty($media) && !empty($media->featured_image) }}") {
            var staticFeaturedImage = "{{ asset(@$media->featured_image) }}";
        } else {
            var staticFeaturedImage = "{{ asset('assets/admin/media/images/blank-image.webp') }}";
        }

        function textToSlug(text) {
            return text
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '-');
        }
        $(document).on('keyup', "#title", function() {
            var text = $("#title").text().trim();
            var slug = textToSlug(text);
            $("#slug").val(slug);
        });

        $(document).on('keyup', ".generate-slug", function() {
            var text = $(this).val();
            var slug = textToSlug(text);
            $(this).val(slug);
        });
        
        
        
        
        $(function() {

            $('#type').select2();
            $('#tags').select2({
                placeholder : "Select Tags"
            });

            $('#start_time').datetimepicker({
                pickDate: false,
                pickTime: true,
                format: 'LT'
            });
            $('#end_time').datetimepicker({
                pickDate: false,
                pickTime: true,
                format: 'LT'
            });

            if ("{{ !empty($media) && !empty($media->content) }}") {
                var editcontent = he.decode(`{!! @$media->content !!}`);
                var commentPattern = /<!--(.*?)-->((.|\n)*?)<!--(.*?)-->/gs;
                var sectionContent = [];
                var match;
                while ((match = commentPattern.exec(editcontent)) !== null) {
                    var comment = match[1].trim();
                    var content = match[2].trim();
                    sectionContent.push({
                        comment: comment,
                        content: content
                    });
                }
                sectionContent.forEach(element => {
                    var section = element.comment.replace('dhn:', '').trim();
                    if (section == "image") {
                        var imageContent = {};
                        $("#handle-edit-image").html(element.content);
                        imageContent.src = $("#handle-edit-image").find("img").attr('src');
                        imageContent.imagestyle = ($("#handle-edit-image").find("img").attr('style') !=
                            undefined) ? $("#handle-edit-image").find("img").attr('style') : '';
                        imageContent.boxstyle = ($("#handle-edit-image").find("div:first").attr('style') !=
                            undefined) ? $("#handle-edit-image").find("div:first").attr('style') : '';
                        imageContent.boxclass = ($("#handle-edit-image").find("div:first").attr('class') !=
                            undefined) ? $("#handle-edit-image").find("div:first").attr('class') : '';
                        imageContent.handleboxstyle = ($("#handle-edit-image").find("div:first").find(
                            "div:first").attr('style') != undefined) ? $("#handle-edit-image").find(
                            "div:first").find("div:first").attr('style') : '';
                        $("#handle-edit-image").find("img").remove();
                        imageContent.paragraph = ($("#handle-edit-image").find("div:first").find(
                            "div:first").html() != undefined) ? $("#handle-edit-image").find(
                            "div:first").find("div:first").html() : '';
                        setSection(section, imageContent);
                    } else {
                        if (section.indexOf("image") !== -1) {
                            var values = section.replace("image", "").trim();
                            var valueObj = {};
                            if (values != "" && values != null) {
                                valueObj = JSON.parse(values);
                            }
                            var imageContent = {};
                            $("#handle-edit-image").html(element.content);
                            imageContent.src = $("#handle-edit-image").find("img").attr('src');
                            imageContent.imagestyle = ($("#handle-edit-image").find("img").attr('style') !=
                                undefined) ? $("#handle-edit-image").find("img").attr('style') : '';
                            imageContent.boxstyle = "";
                            imageContent.boxclass = ((valueObj && (valueObj.align) && (valueObj.align ==
                                "center")) ? 'd-flex justify-content-center' : '');
                            imageContent.handleboxstyle = ((valueObj && (valueObj.sizeSlug) && (valueObj
                                    .sizeSlug == "large" || valueObj.sizeSlug == "full")) ?
                                'width : 100%;' : '');
                            $("#handle-edit-image").find("img").remove();
                            imageContent.paragraph = ($("#handle-edit-image").find("figcaption").html() !=
                                undefined) ? $("#handle-edit-image").find("figcaption").html() : '';
                            console.log(imageContent, valueObj);
                            setSection("image", imageContent);
                        } else {
                            setSection(section, element.content);
                        }
                    }
                });
            }

            $(document).on('click', '.select-image', function() {
                $("#featured_image").trigger('click');
            });

            $(document).on('keypress', '#start_time,#end_time', function(event) {
                event.preventDefault();
            });

            $(document).on('change', '#featured_image', function(e) {
                if ($(this).val() != "" && $(this).val() != null) {
                    var file = e.target.files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#preview-featured-image").attr('src', e.target.result);
                    };
                    if (file) {
                        reader.readAsDataURL(file);
                    }
                } else {
                    $("#preview-featured-image").attr('src', staticFeaturedImage);
                }
            });

            $('#media-date').datetimepicker({
                defaultDate: new Date(),
            });

            // console.log();

            if ("{{ !empty($media->published_on) }}") {
                var dateString = "{{ @$media->published_on }}";

                var dateParts = dateString.split(" "); // Split date and time
                var date = dateParts[0]; // "YYYY-MM-DD"
                var time = dateParts[1]; // "HH:mm:ss"

                // Split the date
                var dateComponents = date.split("-");
                var year = parseInt(dateComponents[0]);
                var month = parseInt(dateComponents[1]) - 1; // Months are 0-based (January is 0)
                var day = parseInt(dateComponents[2]);

                // Split the time
                var timeComponents = time.split(":");
                var hours = parseInt(timeComponents[0]);
                var minutes = parseInt(timeComponents[1]);

                // Format the date in the desired format (MM/DD/YYYY h:mm A)
                var formattedDate = (month + 1).toString().padStart(2, "0") + "/" + day.toString().padStart(2,
                    "0") + "/" + year + " " + hours.toString().padStart(2, "0") + ":" + minutes.toString().padStart(
                        2, "0");

                $('#media-date').val(formattedDate).trigger('change');
            } else {
                // alert(123);
                $('#media-date').trigger('change');
            }
            
            $(".sidebar__sticky .card-body .accordion").show();
        })
    </script>
@endsection

