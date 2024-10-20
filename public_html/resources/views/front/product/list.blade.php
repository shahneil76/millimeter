@extends('front.layout.master')
@section('content')
    <section class="container ms-ml-decimal-collection decimal-collection-section first-section mb-75px">
        <div class="row mb-50px">
            <div class="col-lg-12">
                <h2 class="section-title mb-2">
                    <span>{{ !empty($category->get_parent->get_parent->name) ? $category->get_parent->name : $category->name . (!empty($category->short_code) ? '- ' . $category->short_code : '') }}</span>
                </h2>
                @if (!empty($category->get_parent->get_parent->name))
                    <h3 class="title title-greay mb-2">MASTER SUEDE - MS</h3>
                @endif
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 mb-5">
                        <div class="paragraph">
                            @if (!empty($category->bolder_text))
                                <h5 class="dot-tags">{{ $category->bolder_text }}</h5>
                            @endif
                            @if (!empty($category->description))
                                <p class="p-text mb-0">{{ $category->description }}</p>
                            @endif
                        </div>
                    </div>
                    @foreach ($products as $product)
                        <a href="{{ route('product',['slug' => $product->slug]) }}" class="col-md-3 col-12">
                            <div class="card custom-card">
                                <img src="{{ asset($product->thumbnail_img) }}" class="w-100 product-listing-img {{ (isset($product->get_category->get_parent->name) && ($product->get_category->get_parent->name == "BAND.EDGE")) ? "bandedge-product-listing" : "" }}" alt="">
                                <div class="card-detail">
                                    <p>{{ $product->name }}</p>
                                    <img src="{{ asset('assets/front/images/logo.svg') }}" alt="">
                                </div>
                                <div class="additional-details">
                                    <img src="{{ asset('assets/front/images/logo.svg') }}" alt="">
                                    <p>{{ $product->name }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
