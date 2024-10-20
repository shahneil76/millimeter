@extends('front.layout.master')
@section('content')
    @if (!empty($category->banner_image))
        <section class="first-section mb-75px">
            <img src="{{ asset($category->banner_image) }}" class="w-100" alt="blog">
        </section>
    @endif
    <section
        class="{{ empty($category->banner_image) ? 'first-section' : '' }} container decimal-collection-section mb-75px">
        <div class="row mb-50px">
            <div class="col-lg-12 {{ ((!empty($category->get_parent))) ? "mb-50px" : "" }}">
                @if (empty($category->get_parent))
                    @if (isset($category->title) && $category->title !== '')
                        <h2 class="section-title"><span>{{ $category->name }}</span></h2>
                        <h3 class="title title-greay my-2">{{ $category->title }}</h3>
                    @else
                        <h2 class="section-title"><span>{{ ($category->name == "COLLEZIONE DECI.MMAL") ? "COLLEZIONE DECI.MMAL" : $category->name }}</span></h2>
                        @if (($category->name == "COLLEZIONE DECI.MMAL"))
                            <h3 class="title title-greay my-2">Surfaces with an edge</h3>
                        @endif
                        {{-- <h3 class="title underline">{{ $category->name }}</h3> --}}
                    @endif
                    <p class="p-text mt-4 mb-5">{{ $category->description }}</p>
                @else
                    <h2 class="section-title">
                        <span>{{ $category->title }}</span>
                    </h2>
                    <h3 class="title title-greay my-2">{{ $category->sub_title }}</h3>
                @endif
            </div>
            <div class="row">
                @if (!empty($category->get_parent))
                    <div class="col-md-4 mb-50px-phone">
                        <h5 class="dot-tags">{{ $category->bolder_text }}</h5>
                        <p class="p-text mb-0">{{ $category->description }}</p>
                    </div>
                @endif
                @foreach ($category->childs as $child)
                    <div class="{{ count($category->childs) == 4 ? 'col-md-3' : 'col-md-4' }}">
                        <div class="card custom-card">
                            <img src="{{ asset($child->image_path) }}" class="w-100" alt="">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="p-text-white mb-0 text-uppercase"><b>{{ $child->name }}</b></p>
                                    </div>
                                    <div>
                                        <a class="stretched-link" href="{{ (count($child->childs) > 0) ? route('category', ['slug' => $child->slug]) : route('products', ['slug' => $child->slug]) }}">
                                            <img src="{{ asset('assets/front/images/icon/arrow.png') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
