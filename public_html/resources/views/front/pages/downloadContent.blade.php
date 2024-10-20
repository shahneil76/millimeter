@extends('front.layout.master')
@section('css')
<style>
	body
	{
		overflow-x: hidden;
	}
</style>
@endsection
@section('content')
    <section class="container ms-ml-decimal-collection decimal-collection-section first-section mb-75px">
        <div class="row mb-50px">
            <div class="col-md-4">
                <div class="card custom-card">
                    <img src="{{ asset('assets/front/images/brochure-thubnail.jpg') }}" class="w-100" alt="">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="p-text-white mb-0 text-uppercase"><b>MM_COLLEZIONE_DECIMMAL</b></p>
                            </div>
                            <div>
                                <a class="stretched-link" download href="{{ asset($download_file->value) }}">
                                    <img src="{{ asset('assets/front/images/download-icon.png') }}" style="width: 17px;" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    
       
@endsection
