@extends('front.layout.master')
@section('content')
    <section class="container first-section blog-details-section mb-75px">
        <div class="row">
            <div class="col-lg-12">
                <img src="{{ asset($data->featured_image) }}" class="blog-view-img" alt="blog">
                <div class="blog-content">
                    <span class="date-text">{{ date("F j, Y", strtotime($data->published_on)) }}</span>
                    <h3 class="title">{{ $data->title }}</h3>
                    {!! $data->content !!}
                </div>
                <div class="d-flex justify-content-between">
                    <div class="d-flex justify-content-around align-items-center gap-8rem">
                        @if (count($data->tags) > 0)  
                        <p class="mb-0 label-text">Tags :</p>
                            @foreach ($data->tags as $tag)
                                <a href="{{ route('tag.blogs',['slug' => $tag->slug]) }}" class="tag-tab">{{ $tag->tag_name }}</a>
                            @endforeach
                        @endif
                    </div>
                    <!--<div class="d-flex justify-content-around align-items-center gap-8rem">-->
                    <!--    <p class="mb-0 label-text">Share :</p>-->
                    <!--    <a href="#">-->
                    <!--        <img src="{{ asset('assets/front/images/icon/linkdin.png') }}" alt="">-->
                    <!--    </a>-->
                    <!--    <a href="#">-->
                    <!--        <img src="{{ asset('assets/front/images/icon/insta.png') }}" alt="">-->
                    <!--    </a>-->
                    <!--    <a href="#">-->
                    <!--        <img src="{{ asset('assets/front/images/icon/facebook.png') }}" alt="">-->
                    <!--    </a>-->
                    <!--    <a href="#">-->
                    <!--        <img src="{{ asset('assets/front/images/icon/youtube.png') }}" alt="">-->
                    <!--    </a>-->
                    <!--    <a href="#">-->
                    <!--        <img src="{{ asset('assets/front/images/icon/x.png') }}" alt="">-->
                    <!--    </a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </section>
@endsection
