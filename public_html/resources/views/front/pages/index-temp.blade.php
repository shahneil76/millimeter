@extends('front.layout.master')
@section('content')
    <section class="container height-section">
        <div class="content">
            <h1>&nbsp;</h1>
        </div>
    </section>

    <div id="set-height"></div>
    {{-- https://millimetre.iooqtech.in/assets/front/video/ps_am_webanim.mp4 --}}
    <video id="videoplayerhtml" class="f-video-player" preload="" poster="" muted="" data-pmcvt="true">
        @if(!empty($data))
            <source src="{{ $data->value }}" type="video/mp4" />
            <source src="" type="video/webm" />
            <source src="" type="video/ogg" />
        @endif
    </video>
@endsection

@section('script')
    <script src="{{ asset('assets/front/js/sticky.js') }}"></script>
    <script>
        $(document).ready(function(){
            enterView({
                selector: "section",
                enter: function(el) {
                    console.log(el);
                    el.classList.add("entered");
                },
            });
    
            var frameNumber = 0, // start video at frame 0
                // lower numbers = faster playback
                playbackConst = 1500,
                // get page height from video duration
                setHeight = document.getElementById("set-height"),
                // select video element
                vid = document.getElementById("v0");
            // var vid = $('#v0')[0]; // jquery option
    
            // dynamically set the page height according to video length
            vid.addEventListener("loadedmetadata", function() {
                setHeight.style.height =
                    Math.floor(vid.duration) * playbackConst + "px";
            });
    
            // Use requestAnimationFrame for smooth playback
            function scrollPlay() {
                console.log(123);
                var frameNumber = window.pageYOffset / playbackConst;
                vid.currentTime = frameNumber;
                window.requestAnimationFrame(scrollPlay);
            }
    
            window.requestAnimationFrame(scrollPlay);
        });
    </script>
@endsection
