<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} | Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}?v=7.0.6" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendors Styles-->


    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets/admin/plugins/global/plugins.bundle.css') }}?v=7.0.6" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.css') }}?v=7.0.6" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/css/style.bundle.css') }}?v=7.0.6" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->

    <link href="{{ asset('assets/admin/css/themes/layout/header/base/light.css') }}?v=7.0.6" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/css/themes/layout/header/menu/light.css') }}?v=7.0.6" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/css/themes/layout/brand/dark.css') }}?v=7.0.6" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/css/themes/layout/aside/dark.css') }}?v=7.0.6" rel="stylesheet"
        type="text/css" /> <!--end::Layout Themes-->

    <link rel="shortcut icon" href="{{ asset('assets/admin/media/logos/favicon.png') }}" />
    @yield('css')
</head>
<!--end::Head-->
