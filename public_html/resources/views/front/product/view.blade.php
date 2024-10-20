@extends('front.layout.master')
@section('content')
    <section class="product-detail-page decimal-collection-section first-section mb-75px">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-lg-6 col-12">
                        <div class="image-div">
                            <div class="row">
                                <div class="col-3">
                                    <div
                                        class="option-img mb-4 {{ isset($product->get_category) && isset($product->get_category->get_parent) && $product->get_category->get_parent->name == 'BAND.EDGE' ? 'bandedge-vertical' : '' }}">
                                        <img src="{{ asset($product->image1) }}"
                                            class="change-img {{ isset($product->get_category) && isset($product->get_category->get_parent) && $product->get_category->get_parent->name == 'BAND.EDGE' ? 'main-bandedge-vertical' : '' }}"
                                            alt="">
                                    </div>
                                    @isset($product->image2)
                                        <div class="option-img mb-4">
                                            <img src="{{ asset($product->image2) }}" class="change-img" alt="">
                                        </div>
                                    @endisset
                                    @isset($product->image3)
                                        <div class="option-img mb-4">
                                            <img src="{{ asset($product->image3) }}" class="change-img" alt="">
                                        </div>
                                    @endisset
                                </div>
                                <div class="col-9">
                                    <div
                                        class="main-img {{ isset($product->get_category) && isset($product->get_category->get_parent) && $product->get_category->get_parent->name == 'BAND.EDGE' ? 'box-bandedge-vertical' : '' }}">
                                        <img src="{{ asset($product->image1) }}" class="main-img main-img-replace"
                                            alt="">
                                    </div>
                                </div>
                                @if (isset($product->get_specification))
                                    @foreach ($product->get_specification as $specification)
                                        <div class="col-12">
                                            <img src="{{ asset($specification->image_path) }}" alt=""
                                                class="w-90">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-6 col-12 mt-50px-phone">
                        <div class="product-detail">
                            <div class="product-name mb-3">
                                <P><img src="{{ asset('assets/front/images/icon/line.png') }}" alt="">
                                    {{ $product->get_category->name }} - {{ $product->get_category->short_code }}</P>
                                <h5>{{ $product->name }}</h5>
                                {{-- <h5 class="fw-lighter">{{ @$product->product_code }}</h5> --}}
                            </div>
                            <div class="product-description">
                                {!! @$product->description !!}
                            </div>
                            @if (count($product->get_matching))
                                <div class="laminate-code mt-4 mb-5">
                                    @if (isset($product->get_category) &&
                                            isset($product->get_category->get_parent) &&
                                            $product->get_category->get_parent->name == 'BAND.EDGE')
                                        <h5>Matching laminate code</h5>
                                    @else
                                        <h5>Matching BandEdge Code</h5>
                                    @endif
                                    @foreach ($product->get_matching as $matching_product)
                                        <div class="{{ !$loop->first ? 'mt-4' : '' }}">
                                            <a href="{{ route('product', ['slug' => $matching_product->slug]) }}">{{ !empty($product->matching_code_text) ? $product->matching_code_text : $matching_product->product_code }}
                                                <img src="{{ asset('assets/front/images/icon/arrow.png') }}"
                                                    alt=""></a>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <a href="#">Know More <img src="{{ asset('assets/front/images/icon/arrow.png') }}" alt=""></a> --}}
                            @else
                                {{-- <div class="mt-4">
                                <a href="#">Know More <img src="{{ asset('assets/front/images/icon/arrow.png') }}" alt=""></a>
                            </div> --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).on("click", ".change-img", function() {
            if ($(this).hasClass('main-bandedge-vertical')) {
                $(".main-img-replace").parent().addClass('box-bandedge-vertical');
            } else {
                $(".main-img-replace").parent().removeClass('box-bandedge-vertical');
            }
            $(".main-img-replace").attr("src", $(this).attr("src"));
        })
    </script>
@endsection
