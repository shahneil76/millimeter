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
            <div class="col-12 col-md-5">
                <div class="become-part-journy-form">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="become-part-of-journy-form-heading">
                                <h5>Become a Part of Our Journey</h5>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="become-part-of-journy">
                                <form action="{{ route('contactus.part') }}" method="POST" id="part-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="text" id="part_name" name="part_name"
                                                placeholder="Your Name">
                                            <span class="text-danger errors" id="part_nameerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="text" id="part_designation"
                                                name="part_designation" placeholder="Designation">
                                            <span class="text-danger errors" id="part_designationerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="number" id="part_phoneno" name="part_phoneno"
                                                placeholder="Phone No">
                                            <span class="text-danger errors" id="part_phonenoerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="email" id="part_email" name="part_email"
                                                placeholder="Email">
                                            <span class="text-danger errors" id="part_emailerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="text" id="part_company" name="part_company"
                                                placeholder="Company">
                                            <span class="text-danger errors" id="part_companyerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="text" id="part_city" name="part_city"
                                                placeholder="City">
                                            <span class="text-danger errors" id="part_cityerror"></span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input class="w-100" type="text" id="part_message" name="part_message"
                                                placeholder="Message">
                                            <span class="text-danger errors" id="part_messageerror"></span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <button type="submit">Submit <img
                                                    src="{{ asset('assets/front/images/icon/arrow.png') }}"
                                                    alt=""></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 vertical-border"></div>
            <div class="col-12 col-md-6 address-map">
                {{-- <div class="become-channel-partner-form">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="become-channel-partner-form-heading">
                                <h5>Become a Channel Partner</h5>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="become-channel-partner">
                                <form action="{{ route('contactus.channel') }}" method="POST" id="channel-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="text" id="channel_name" name="channel_name"
                                                placeholder="Your Name">
                                            <span class="text-danger errors" id="channel_nameerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="text" id="channel_designation"
                                                name="channel_designation" placeholder="Designation">
                                            <span class="text-danger errors" id="channel_designationerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="number" id="channel_phoneno" name="channel_phoneno"
                                                placeholder="Phone No">
                                            <span class="text-danger errors" id="channel_phonenoerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="email" id="channel_email" name="channel_email"
                                                placeholder="Email">
                                            <span class="text-danger errors" id="channel_emailerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="text" id="channel_company" name="channel_company"
                                                placeholder="Company">
                                            <span class="text-danger errors" id="channel_companyerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="text" id="channel_city" name="channel_city"
                                                placeholder="City">
                                            <span class="text-danger errors" id="channel_cityerror"></span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input class="w-100" type="text" id="channel_message"
                                                name="channel_message" placeholder="Message">
                                            <span class="text-danger errors" id="channel_messageerror"></span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <button type="submit">Submit <img
                                                    src="{{ asset('assets/front/images/icon/arrow.png') }}"
                                                    alt=""></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="address pb-4">
                    <div class="corporate-office">
                        <div class="mb-3">
                            <h5>Corporate Office</h5c>
                        </div>
                        <p class="fw-light">Get in touch with Millimetre!</p>
                        <div class="location d-flex">
                            <div class="me-2">
                                <img src="{{ asset('assets/front/images/icon/location.png') }}" alt="">
                            </div>
                            <p class="fw-light">A3, 11th Floor, Bsquare, Colonnade-2, Rajpath Club Road, Off SG Highway, Ahmedabad 380 054, India.</p>
                        </div>
                        <div class="email mb-3">
                            <a href="mailto:media@lamitude.com"><img src="{{ asset('assets/front/images/icon/email.png') }}"
                                    alt=""> media@lamitude.com</a>
                        </div>
                        <div class="email mb-3">
                            <a href="mailto:info@lamitude.com"><img src="{{ asset('assets/front/images/icon/email.png') }}"
                                    alt=""> info@lamitude.com</a>
                        </div>
                        <div class="email">
                            <a href="tel:+91 9879873500"><img src="{{ asset('assets/front/images/icon/call.png') }}"
                                    alt=""> +91 98798 73500</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" mb-5">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="map">
                            <iframe width="100%" height="300" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.759467468402!2d72.5031214!3d23.032602250000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9b474dda2b5b%3A0xa31400dea793f4f!2sCOLONNADE-2%2C%20Bodakdev%2C%20Ahmedabad%2C%20Gujarat%20380054!5e0!3m2!1sen!2sin!4v1712857695943!5m2!1sen!2sin"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).on("submit", "#part-form", async function(e) {
            e.preventDefault();
            var form = $(this);
            var data = await ajaxDynamicMethod($(this).attr('action'), $(this).attr('method'), generateFormData(
                this));
            if (data.success) {
                form[0].reset();
                toastrsuccess(data.msg);
            }
        });

        $(document).on("submit", "#channel-form", async function(e) {
            e.preventDefault();
            var form = $(this);
            var data = await ajaxDynamicMethod($(this).attr('action'), $(this).attr('method'), generateFormData(
                this));
            if (data.success) {
                form[0].reset();
                toastrsuccess(data.msg);
            }
        });
    </script>
@endsection
