@extends('front.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/front/css/main-home.css') }}?v=1.1">
@endsection
@section('content')
    <div id="loadingSpinner" class="loading-spinner">
        <img src="{{ asset('assets/front/images/Milimeter-Loading-GIF-V1.gif') }}" alt="Loading..." class="loading-image" />
    </div>
    {{-- <div class="intro">
        <!-- Video for small devices -->
        <video preload="metadata" class="mobile-video" tabindex="0">
            <source src="https://www.millimetre.com/uploads/2024/04/Milimeter-TextForMobilesite-6-Sec.mp4" type="video/mp4">
        </video>
        @if (!empty($data))
            <video preload="metadata" class="desktop-video" tabindex="0">
                <source src="{{ $data->value }}" type="video/mp4">
            </video>
        @endif
    </div> --}}
    <div class="intro" id="imageContainer"></div>
    <div class="sticky-placeholder"></div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.1.1/gsap.min.js"></script>
    {{-- <script src="{{ asset('assets/front/js/scroll.js') }}"></script> --}}
    <script src="{{ asset('assets/front/js/video.js') }}?v=1.1"></script>
@endsection
