<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Millimetre</title>
    <link rel="shortcut icon" href="{{ asset('assets/admin/media/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/front/css/global.css') }}?v=1.53" />
    @if (Route::currentRouteName() != 'home')
        <link rel="stylesheet" href="{{ asset('assets/front/css/main.css') }}?v=1.53" />
    @endif
    <link rel="stylesheet" href="{{ asset('assets/front/css/toastr.min.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />    
    @yield('css')
</head>
