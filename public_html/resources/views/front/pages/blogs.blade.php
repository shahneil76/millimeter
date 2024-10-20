@extends('front.layout.master')
@section('content')
<section class="container first-section blog-section mb-50px">
    <div class="row">
        @foreach ($data as $post)    
            <div class="col-lg-4">
                <div class="card custom-card">
                    <img src="{{ asset($post->featured_image) }}" class="w-100 blog-img" alt="blog">
                    <div class="card-body">
                        <span class="date-text">{{ date("F j, Y", strtotime($post->published_on)) }}</span>
                        <h3 class="title">{{ $post->title }}</h3>
                        <p class="expert">{{ $post->excerpt }}</p>
                        <a href="{{ (empty($post->redirection)) ? route('blog.view',['slug' => $post->slug]) : $post->redirection }}" target="{{ (!empty($post->redirection)) ? "_blank" : "" }}" class="blog-link">Read More <img src="{{ asset('assets/front/images/icon/arrow.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
